<?php

namespace Shopper\Framework\Http\Livewire\Modals;

use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Shopper\Framework\Http\Livewire\Products\WithAttributes;
use Shopper\Framework\Repositories\Ecommerce\ProductRepository;
use Shopper\Framework\Repositories\InventoryRepository;
use WireUi\Traits\Actions;

class AddVariant extends ModalComponent
{
    use Actions;
    use WithAttributes;

    public int $productId;

    public string $currency;

    public $quantity;

    public $files = [];

    protected $listeners = [
        'shopper:filesUpdated' => 'onFilesUpdated',
    ];

    public function mount(int $productId, string $currency)
    {
        $this->productId = $productId;
        $this->currency = $currency;
    }

    public function onFilesUpdated($files)
    {
        $this->files = $files;
    }

    public function save()
    {
        $this->validate($this->rules());

        $product = (new ProductRepository())->create([
            'name' => $this->name,
            'slug' => $this->name,
            'sku' => $this->sku,
            'type' => $this->type,
            'barcode' => $this->barcode,
            'is_visible' => true,
            'security_stock' => $this->securityStock,
            'old_price_amount' => $this->old_price_amount,
            'price_amount' => $this->price_amount,
            'cost_amount' => $this->cost_amount,
            'parent_id' => $this->productId,
        ]);

        if (collect($this->files)->isNotEmpty()) {
            collect($this->files)->each(
                fn ($file) => $product->addMedia($file)->toMediaCollection(config('shopper.system.storage.disks.uploads'))
            );
        }

        if ($this->quantity && count($this->quantity) > 0) {
            foreach ($this->quantity as $inventory => $value) {
                $product->mutateStock(
                    $inventory,
                    $value,
                    [
                        'event' => __('shopper::pages/products.inventory.initial'),
                        'old_quantity' => $value,
                    ]
                );
            }
        }

        $this->notification()->success(
            __('shopper::layout.status.added'),
            __('shopper::pages/products.notifications.variation_create')
        );

        $this->emit('onVariantAdded');

        $this->closeModal();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:' . shopper_table('products'),
            'sku' => 'nullable|unique:' . shopper_table('products'),
            'barcode' => 'nullable|unique:' . shopper_table('products'),
        ];
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function render(): View
    {
        return view('shopper::livewire.modals.add-variant', [
            'inventories' => (new InventoryRepository())->get(),
        ]);
    }
}

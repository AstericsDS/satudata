<?php

namespace App\Livewire\Button;

use Livewire\Component;
use App\Models\Synchronize;
use App\Jobs\GenerateUsers as TenThousand;

class SynchronizeButtonOne extends Component
{
    public $elapsedTime;
    public $startTime;
    public $endTime;
    public Synchronize $sync;
    public function process($name)
    {
        $sync = Synchronize::updateOrCreate(
            ['name' => $name],
            ['status' => 'pending']
        );

        TenThousand::dispatch($sync->id);
    }
    public function mount()
    {
        $this->sync = Synchronize::firstOrCreate(
            ['name' => 'ten_thousand'],
            ['status' => 'idle'] // default status
        );
    }
    public function render()
    {
        return <<<'HTML'
        <tr wire:poll.1s class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Fake 10,000 datas
            </th>
            <td class="px-6 py-4">
                <button wire:click="process('ten_thousand')" class="rounded-md p-2 bg-blue-500 text-white cursor-pointer hover:bg-blue-600" wire:loading.attr="disabled" wire:target="process">
                    @if($sync->status === 'done' || $sync->status === 'idle')
                        <span>Generate Data</span>
                    @else
                        <span>Generating Data...</span>
                    @endif
                </button>
            </td>
            <td class="px-6 py-4">
                {{ $elapsedTime ?? '' }}
            </td>
            <td class="px-6 py-4">
                {{ $endTime ?? '' }}
            </td>
        </tr>
        HTML;
    }
}

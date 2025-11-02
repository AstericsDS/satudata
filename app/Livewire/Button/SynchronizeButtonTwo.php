<?php

namespace App\Livewire\Button;

use Livewire\Component;
use App\Jobs\GenerateAnotherUser as FiveThousand;

class SynchronizeButtonTwo extends Component
{
    public $elapsedTime;
    public $startTime;
    public $endTime;
    public function process()
    {
        $job = new FiveThousand();
        $this->startTime = microtime(true);
        FiveThousand::dispatchSync($job);
        $this->elapsedTime = round(microtime(true) - $this->startTime, 2);
        $this->endTime = microtime();
    }
    public function render()
    {
        return <<<'HTML'
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Fake 10,000 datas
            </th>
            <td class="px-6 py-4">
                <button wire:click="process" class="rounded-md p-2 bg-blue-500 text-white cursor-pointer hover:bg-blue-600" wire:loading.attr="disabled" wire:target="process">
                    <span wire:target="process" wire:loading.remove>Generate Data</span>
                    <span wire:target="process" wire:loading>Generating Data...</span>
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

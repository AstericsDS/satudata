<div>
    <div class="relative overflow-x-auto m-4">
        <table wire:poll.3s class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Process
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Elapsed Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date Synchronized
                    </th>
                </tr>
            </thead>
            <tbody>
                <livewire:button.synchronize-button-one />
                <livewire:button.synchronize-button-two />
            </tbody>
        </table>
    </div>
</div>

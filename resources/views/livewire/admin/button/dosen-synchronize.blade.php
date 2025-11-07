<tr wire:poll.5s class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
    <td class="px-6 py-4">
        2
    </td>
    <td class="px-6 py-4">
        Dosen
    </td>
    <td class="px-6 py-4">
        @if($sync->status === 'unsynchronized')
            <span class="bg-[#ECD1D1] p-2 rounded-md border-[1px] border-[#B73E3E]/18 text-red-500">Belum Sinkron</span>
        @elseif($sync->status === 'synchronized')
            <span class="bg-[#D7EFEA] p-2 rounded-md border-[1px] border-[#006569]/18 text-unj">Tersinkron</span>
        @elseif($sync->status === 'synchronizing')
            <span class="bg-[#F4F0D7] p-2 rounded-md border-[1px] border-[#C9A800]/18 text-yellow-600">Menyinkronkan</span>
        @elseif($sync->status === 'error')
            <span class="bg-[#ECD1D1] p-2 rounded-md border-[1px] border-[#B73E3E]/18 text-red-500">Gagal Sinkron</span>
        @endif
    </td>
    <td class="px-6 py-4 flex flex-col space-y-2">
        @if($sync->status !== 'unsynchronized')
        <span class="text-gray-800">{{ $sync->updated_at->locale('id')->translatedFormat('d F Y (H:i:s)') }}</span>
            <span class="text-gray-400">{{ $sync->updated_at->locale('id')->diffForHumans() }}</span>
        @else
            <span class="text-gray-800">-</span>
        @endif
    </td>
    <td class="px-6 py-4">
        <button wire:click="process()" @disabled($sync->status === 'synchronizing') class="{{ $sync->status === 'synchronizing' ? 'bg-gray-400 cursor-default' : 'bg-unj hover:bg-unj/90 cursor-pointer' }} p-1 text-white rounded-lg transition-all">
            @if($sync->status === 'synchronized' || $sync->status === 'unsynchronized' || $sync->status === 'error')
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M6 12.05q0 1.125.425 2.188T7.75 16.2l.25.25V15q0-.425.288-.712T9 14t.713.288T10 15v4q0 .425-.288.713T9 20H5q-.425 0-.712-.288T4 19t.288-.712T5 18h1.75l-.4-.35q-1.3-1.15-1.825-2.625T4 12.05Q4 9.7 5.2 7.787T8.425 4.85q.35-.2.738-.025t.512.575q.125.375-.012.75t-.488.575q-1.45.8-2.312 2.213T6 12.05m12-.1q0-1.125-.425-2.187T16.25 7.8L16 7.55V9q0 .425-.288.713T15 10t-.712-.288T14 9V5q0-.425.288-.712T15 4h4q.425 0 .713.288T20 5t-.288.713T19 6h-1.75l.4.35q1.225 1.225 1.788 2.663T20 11.95q0 2.35-1.2 4.263t-3.225 2.937q-.35.2-.737.025t-.513-.575q-.125-.375.013-.75t.487-.575q1.45-.8 2.313-2.212T18 11.95"/>
                </svg>
            @elseif($sync->status === 'synchronizing')
                <svg class="animate-spin text-white" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M6 12.05q0 1.125.425 2.188T7.75 16.2l.25.25V15q0-.425.288-.712T9 14t.713.288T10 15v4q0 .425-.288.713T9 20H5q-.425 0-.712-.288T4 19t.288-.712T5 18h1.75l-.4-.35q-1.3-1.15-1.825-2.625T4 12.05Q4 9.7 5.2 7.787T8.425 4.85q.35-.2.738-.025t.512.575q.125.375-.012.75t-.488.575q-1.45.8-2.312 2.213T6 12.05m12-.1q0-1.125-.425-2.187T16.25 7.8L16 7.55V9q0 .425-.288.713T15 10t-.712-.288T14 9V5q0-.425.288-.712T15 4h4q.425 0 .713.288T20 5t-.288.713T19 6h-1.75l.4.35q1.225 1.225 1.788 2.663T20 11.95q0 2.35-1.2 4.263t-3.225 2.937q-.35.2-.737.025t-.513-.575q-.125-.375.013-.75t.487-.575q1.45-.8 2.313-2.212T18 11.95"/>
                </svg>
            @endif
        </button>
    </td>
</tr>
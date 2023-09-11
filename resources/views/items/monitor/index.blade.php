@if (auth()->user()->is_admin)
<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Monitors') }}
    </x-slot>

    @can('monitor create')
    <x-admin.add-link href="{{ route('monitor.create') }}">
        {{ __('Add Monitor') }}
    </x-admin.add-link>
    @endcan

    <div class="py-2">
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <x-admin.grid.search action="{{ route('monitor.index') }}" />
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr>
                        <x-admin.grid.th>
                            {{ __('Icon') }}
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Model', 'attribute' => 'model'])
                        </x-admin.grid.th> 
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Size', 'attribute' => 'size'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Manufacturer', 'attribute' => 'manufacturer_id'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Year', 'attribute' => 'Year'])
                        </x-admin.grid.th>
                        @canany(['monitor edit', 'monitor delete'])
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($monitors as $monitor)
                    <tr>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('monitor.show', $monitor->id)}}" class="no-underline hover:underline text-cyan-600"><img style="width: 100px" src="{{ asset($monitor->icon) }}" alt="" class="image"></a>
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('monitor.show', $monitor->id)}}" class="no-underline hover:underline text-cyan-600">{{ $monitor->model }}</a>
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('monitor.show', $monitor->id)}}" class="no-underline hover:underline text-cyan-600">{{ $monitor->size }}</a>
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('monitor.show', $monitor->id)}}" class="no-underline hover:underline text-cyan-600">{{ $monitor->manufacturers->name }}</a>
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('monitor.show', $monitor->id)}}" class="no-underline hover:underline text-cyan-600">{{ $monitor->year }}</a>
                            </div>
                        </x-admin.grid.td>
                        @canany(['monitor edit', 'monitor delete'])
                        <x-admin.grid.td>
                            <form action="{{ route('monitor.destroy', $monitor->id) }}" method="POST">
                                <div class="flex">
                                    @can('monitor edit')
                                    <a href="{{route('monitor.edit', $monitor->id)}}" class="inline-flex items-center px-4 py-2 mr-4 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('Edit') }}
                                    </a>
                                    @endcan

                                    @can('monitor delete')
                                    @csrf
                                    @method('DELETE')
                                    <button class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                        {{ __('Delete') }}
                                    </button>
                                    @endcan
                                </div>
                            </form>
                        </x-admin.grid.td>
                        @endcanany
                    </tr>
                    @endforeach
                    @if($monitors->isEmpty())
                        <tr>
                            <td colspan="2">
                                <div class="flex flex-col justify-center items-center py-4 text-lg">
                                    {{ __('No Result Found') }}
                                </div>
                            </td>
                        </tr>
                    @endif
                </x-slot>
            </x-admin.grid.table>
        </div>
        <div class="py-8">
            {{ $monitors->appends(request()->query())->links() }}
        </div>
    </div>
</x-admin.wrapper>
@else
<link rel="stylesheet" href="{{ asset('css/computersi.css') }}" />
<x-app-layout>
      <div class="product-2">
        <div class="title">
          <div class="section-title">
            <div class="content7">
              <b class="heading2">Computers</b>
            </div>
          </div>
          <div class="button5">
            <div class="button7">View all</div>
          </div>
        </div>
        <div class="content4">
        </div>
      </div>
</x-app-layout>
@endif

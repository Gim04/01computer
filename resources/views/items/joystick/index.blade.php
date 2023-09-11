@if (auth()->user()->is_admin)
<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Joysticks') }}
    </x-slot>
 
    @can('joystick create')
    <x-admin.add-link href="{{ route('joystick.create') }}">
        {{ __('Add Joystick') }}
    </x-admin.add-link>
    @endcan

    <div class="py-2">
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <x-admin.grid.search action="{{ route('joystick.index') }}" />
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
                            @include('admin.includes.sort-link', ['label' => 'Manufacturer', 'attribute' => 'manufacturer_id'])
                        </x-admin.grid.th>
                        @canany(['joystick edit', 'joystick delete'])
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($joysticks as $joystick)
                    <tr>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('joystick.show', $joystick->id)}}" class="no-underline hover:underline text-cyan-600"><img style="width: 100px" src="{{ asset($joystick->icon) }}" alt="" class="image"></a>
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('joystick.show', $joystick->id)}}" class="no-underline hover:underline text-cyan-600">{{ $joystick->model }}</a>
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('joystick.show', $joystick->id)}}" class="no-underline hover:underline text-cyan-600">{{ $joystick->manufacturers->name }}</a>
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('joystick.show', $joystick->id)}}" class="no-underline hover:underline text-cyan-600">{{ $joystick->year }}</a>
                            </div>
                        </x-admin.grid.td>
                        @canany(['joystick edit', 'joystick delete'])
                        <x-admin.grid.td>
                            <form action="{{ route('joystick.destroy', $joystick->id) }}" method="POST">
                                <div class="flex">
                                    @can('joystick edit')
                                    <a href="{{route('joystick.edit', $joystick->id)}}" class="inline-flex items-center px-4 py-2 mr-4 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('Edit') }}
                                    </a>
                                    @endcan

                                    @can('joystick delete')
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
                    @if($joysticks->isEmpty())
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
            {{ $joysticks->appends(request()->query())->links() }}
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
              <b class="heading2">Joysticks</b>
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
    <script type = "text/javascript">

      <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'my_app';

        $conn = new mysqli($host, $username, $password, $database);
      
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT id, model, icon, manufacturer_id FROM joysticks";
        $sql2 = "SELECT id, name FROM manufacturers";

        $result = $conn->query($sql);
        $joysticks = array();

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $joysticks[] = $row;
          }
        }
        
        $result2 = $conn->query($sql2);
        $manufacturers = array();

        if ($result2->num_rows > 0) {
          while ($row = $result2->fetch_assoc()) {
            $manufacturers[] = $row;
          }
        }

        $conn->close();
      ?>

      const computers = <?php echo json_encode($joysticks); ?>;
      const manufacturers = <?php echo json_encode($manufacturers); ?>;


      document.addEventListener('DOMContentLoaded', function () {

        let computerView = 12;
        let currentIndex = 0;
        let ViewAll = document.querySelector('.button5');
        const content4 = document.querySelector('.content4');

        function displayComputers() {
          let totalHeight = computerView * 143;
          document.querySelector('.product-2').style.height = `${totalHeight}px`;
          let height = 970 + totalHeight;
          document.querySelector('.home').style.height = `${height}px`
          let items = 4;

          if (window.matchMedia("(max-width: 1657px)").matches) {
            items = 3;
            document.querySelector('.content4').style.maxWidth = `1000px`;
            let totalHeight = computerView * 165;
            document.querySelector('.product-2').style.height = `${totalHeight}px`;
            let height = 1100 + totalHeight;
            document.querySelector('.home').style.height = `${height}px`
     
          }

          if (window.matchMedia("(max-width: 1112px)").matches) {
            items = 2;
            document.querySelector('.content4').style.maxWidth = `600px`;

            let totalHeight = computerView * 240;
            document.querySelector('.product-2').style.height = `${totalHeight}px`;
            let height = 1000 + totalHeight;
            document.querySelector('.home').style.height = `${height}px`
          }

          if (window.matchMedia("(max-width: 740px)").matches) {
            items = 1;
            document.querySelector('.content4').style.maxWidth = `300px`;
            let totalHeight = computerView * 445;
            document.querySelector('.product-2').style.height = `${totalHeight}px`;
            let height = 1000 + totalHeight;
            document.querySelector('.home').style.height = `${height}px`
          }

          for (let i = currentIndex; i <Math.ceil(computerView/items); i++) {
            const content5 = document.createElement('div');
            content5.classList.add('content5');
            content4.appendChild(content5);
            currentIndex = i*items;

            for (let i = currentIndex; i < Math.floor(currentIndex+items); i++) {
              const computer = computers[i];

              const product = document.createElement('div');
              product.classList.add('product');
              if (window.matchMedia("(max-width: 1112px)").matches) {
                product.style.width = "50%";
              }
              if (window.matchMedia("(max-width: 740px)").matches) {
                product.style.width = "100%";
              }

              const content3 = document.createElement('div');
              content3.classList.add('content3');

              const header1 = document.createElement('div');
              header1.classList.add('header1');

              const heading1 = document.createElement('div');
              heading1.classList.add('heading1');
              for (let j = currentIndex; j < manufacturers.length; j++) {
                const manufacturer = manufacturers[j];
                if (computer.manufacturer_id == manufacturer.id) {
                  heading1.textContent = manufacturer.name;
                }
              }

              
              const text1 = document.createElement('div');
              text1.classList.add('text1');
              text1.innerHTML = `<p> ${computer.model} ${computer.submodel}</p>`;

              const year = document.createElement('div');
              year.classList.add('year');
              year.textContent = new Date(computer.year).getFullYear();

              const button3 = document.createElement('a');
              button3.classList.add('button3');
              button3.href = `computer/${computer.id}`;
              

              const button7 = document.createElement('div');
              button7.classList.add('button7');
              button7.textContent = 'View';

              const imagePreview = document.createElement('div');
              imagePreview.classList.add('placeholder-image');
              imagePreview.innerHTML = `<img src="{{ asset('${computer.icon}') }}">`;

              product.appendChild(imagePreview);
              product.appendChild(content3);
              product.appendChild(button3);

              content3.appendChild(header1);
              content3.appendChild(year);

              header1.appendChild(heading1);
              header1.appendChild(text1);

              button3.appendChild(button7);

              content5.appendChild(product);
            }
          }
        }
        displayComputers();

        ViewAll.addEventListener('click', () => {
          computerView = computers.length;
          currentIndex = 3;
          if (window.matchMedia("(max-width: 1757px)").matches) {
            currentIndex = 4;
          }
          if (window.matchMedia("(max-width:  1112px)").matches) {
            currentIndex = 5;
          }
          if (window.matchMedia("(max-width: 740px)").matches) {
            currentIndex = 12;
          }
          displayComputers();
        });
      })
    </script>
@endif
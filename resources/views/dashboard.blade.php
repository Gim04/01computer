@if (auth()->user()->is_admin)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <script src="{{ asset('js/visitor-counter.js') }}"></script>

    

   <div class="divc"> 
    <div class="cardblue">
        <div class="card-border-top">
        </div>
        <span class="span"> <h1>Home Views</h1></span>
        <br>
        <p class="text"> Views: {{ $viewCount }}</p>
        <p class="text">Daily Views: {{ $viewsPerDay }}</p>
        <p class="text">Monthly Views: {{ $viewsPerMonth }}</p>
        <p class="text">Annual Views: {{ $viewsPerYear }}</p>

        
    </div>

      <div class="cardgreen">
        <div class="card-border-top">
        </div>
        <span class="span"> <h1>Number of computers</h1></span>
        <br>
        <p class="text"> Computers: {{ $computerCount }}</p>
      </div>

      <div class="cardyellow">
        <div class="card-border-top">
        </div>
        <span class="span"> <h1>Number of Keyboards</h1></span>
        <br>
        <p class="text"> Keyboards: {{ $keyboardCount }}</p>
      </div>

      <div class="cardorange">
        <div class="card-border-top">
        </div>
        <span class="span"> <h1>Number of Monitors</h1></span>
        <br>
        <p class="text"> Monitors: {{ $monitorCount }}</p>
      </div>
      
      <div class="cardred">
        <div class="card-border-top">
        </div>
        <span class="span"> <h1>Number of Cables</h1></span>
        <br>
        <p class="text"> Cables: {{ $cableCount }}</p>
      </div>

   </div>
</x-app-layout>
@else
<x-app-layout>
    <div class="cta-45">
        <h1 style="font-family:monoton;
font-size: 70px;">Timeline</h1>

        <div id="toggle-button" class="toggle-button">
        <span>&#8645;</span>
        </div>

        <div id="navigation" class="navigation">
        <button class="arrow arrow-left" id="left">&lt;</button>
        <button class="arrow arrow-right" id="right">&gt;</button>
        </div>
        
        <div class="timeline-container">
        <div id="timeline" class="timeline-horizontal">
            <div id="line" class="line-horizontal"></div>
        </div>
        </div>

        <div id="computers-one" class="computers-above"></div>
        <div id="computers-two" class="computers-below"></div>
    </div>
    <div class="gallery-3">
        <div class="section-title">
        <b class="heading1">Most Liked</b>
        </div>
        <div class="content8">
        <img
            class="placeholder-image"
            alt=""
            src="{{ asset('photo/public/placeholder--image@2x.png') }}"
        />

        <img
            class="placeholder-image"
            alt=""
            src="{{ asset('photo/public/placeholder--image@2x.png') }}"
        />

        <img
            class="placeholder-image"
            alt=""
            src="{{ asset('photo/public/placeholder--image@2x.png') }}"
        />
        </div>
    </div>
    <style>
        .computers-left .image-preview {
            height: 150px;
width: 200px;
        }
        .computers-right .image-preview {
            height: 150px;
width: 200px;
left: -250px
        }
          .computers-above .image-preview{
            left: 90px;
            position: relative;
            top: 70px;
          }
          .computers-below .image-preview{
            left: 90px;
            position: relative;
            top: -120px;
          }
.image-preview {
    max-width: 200px;
}
.image-preview img {
    position: absolute;
}
@media (max-width: 522px){
    .timeline-event-content {
    width: 30vw;
  }
  .computers-left .timeline-event-content, .computers-left .timeline-event-date,{
    left: -10vw;
  }
}
    </style>
    <script type = "text/javascript">

        @php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'my_app';

        $conn = new mysqli($host, $username, $password, $database);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT c.id, c.year, c.model, c.submodel, c.icon FROM computers c INNER JOIN ( SELECT MIN(id) as id, year FROM computers GROUP BY year) min_computers ON c.id = min_computers.id ORDER BY c.year ASC";
        $result = $conn->query($sql);

        $computers = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            $computers[] = $row;
            }
        }

        $conn->close();
        @endphp

        const computers = @php echo json_encode($computers); @endphp


        document.addEventListener('DOMContentLoaded', function () {
        const timeline = document.getElementById('timeline');
        const line = document.getElementById('line');
        const isPhoneScreen = window.matchMedia("(max-width: 768px)").matches;
        const computersOne = document.getElementById('computers-one');
        const computersTwo = document.getElementById('computers-two');
        const imagePreview = document.getElementById('image-preview');
        const toggleButton = document.getElementById('toggle-button');
        const arrowLeft = document.querySelector('.arrow-left');
        const arrowRight = document.querySelector('.arrow-right');
        let isHorizontalLayout = true;

        // Sort computers by date (oldest to newest)
        computers.sort((a, b) => new Date(a.year) - new Date(b.year));

        let maxVisibleComputers;
        let currentIndex = 0;

        if (isPhoneScreen) {
            toggleButton.style.display = "none";
            isHorizontalLayout = !isHorizontalLayout;
            timeline.classList.toggle('timeline-horizontal', isHorizontalLayout);
            timeline.classList.toggle('timeline-vertical', !isHorizontalLayout);
            line.classList.toggle('line-horizontal', isHorizontalLayout);
            line.classList.toggle('line-vertical', !isHorizontalLayout);
            computersOne.classList.toggle('computers-above', isHorizontalLayout);
            computersOne.classList.toggle('computers-left', !isHorizontalLayout);
            computersTwo.classList.toggle('computers-below', isHorizontalLayout);
            computersTwo.classList.toggle('computers-right', !isHorizontalLayout);
            displayComputers();
        }
        if (window.matchMedia("(max-width: 1600px)").matches) {
            maxVisibleComputers = 6;
        }

        function displayComputers() {
            computersOne.innerHTML = '';
            computersTwo.innerHTML = '';

            if (isHorizontalLayout) {
                let totalHeight = '600';
                let height = '2460';
                document.querySelector('.home').style.height = `${height}px`
                document.querySelector('.cta-45').style.height = `${totalHeight}px`;

                maxVisibleComputers = 8;
                if (window.matchMedia("(max-width: 1600px)").matches) {
                maxVisibleComputers = 6;
                }
                if (window.matchMedia("(max-width: 1200px)").matches) {
                maxVisibleComputers = 4;
                }
                if (window.matchMedia("(max-width: 920px)").matches) {
                    height = '2000';
                document.querySelector('.home').style.height = `${height}px`
                }
                const visibleComputers = computers.slice(currentIndex, currentIndex + maxVisibleComputers);
                const oldestDate = new Date(visibleComputers[0].year);
                const newestDate = new Date(visibleComputers[visibleComputers.length - 1].year);

                for (let i = currentIndex; i < Math.min(currentIndex + maxVisibleComputers, computers.length); i++) {
                    const computer = computers[i];

                    const eventDiv = document.createElement('div');
                    eventDiv.classList.add('timeline-event');

                    const eventCircle = document.createElement('div');
                    eventCircle.classList.add('timeline-event-circle');

                    const dateDiv = document.createElement('div');
                    dateDiv.classList.add('timeline-event-date');
                    dateDiv.textContent = new Date(computer.year).getFullYear();

                    const contentDiv = document.createElement('div');
                    contentDiv.classList.add('timeline-event-content');
                    contentDiv.innerHTML = 
                    `<p><strong>Model:</strong> ${computer.model}</p>
                    <p><strong>Submodel:</strong> ${computer.submodel}</p>`;

                    const eventDate = new Date(computer.year);
                    let positionPercentage = (eventDate - oldestDate) / (newestDate - oldestDate) * 80;

                    if (window.matchMedia("(max-width: 1600px)").matches) {
                        positionPercentage = (eventDate - oldestDate) / (newestDate - oldestDate) * 70;
                    }
                    if (window.matchMedia("(max-width: 1200px)").matches) {
                        positionPercentage = (eventDate - oldestDate) / (newestDate - oldestDate) * 60;
                    }
                    document.querySelector('.line-horizontal').style.height = `5px`;
                    arrowLeft.style.display = 'block';
                    arrowRight.style.display = 'block';
                    eventDiv.style.left = `${positionPercentage}%`;

                    eventDiv.appendChild(eventCircle);
                    eventDiv.appendChild(dateDiv);
                    eventDiv.appendChild(contentDiv);

                    const imagePreview = document.createElement('div');
                    imagePreview.classList.add('image-preview');
                    imagePreview.innerHTML = `<img src="{{ asset('${computer.icon}') }}" alt="Computer Image">`;
                    imagePreview.style.display = 'none';

                    eventDiv.appendChild(imagePreview);

                    eventCircle.addEventListener('mouseover', () => {
                        imagePreview.style.display = 'block';
                    });
                    eventCircle.addEventListener('mouseout', () => {
                        imagePreview.style.display = 'none';
                    });

                    if (i % 2 === 0) {
                        computersOne.appendChild(eventDiv);
                    } else {
                        computersTwo.appendChild(eventDiv);
                    } 
                }
            } else {
                currentIndex = 0;
                maxVisibleComputers = computers.length;

                let totalHeight = computers.length * 180;
                const height = 1860 + totalHeight;
                document.querySelector('.line-vertical').style.height = `${totalHeight}px`;
                document.querySelector('.home').style.height = `${height}px`
                document.querySelector('.cta-45').style.height = `${totalHeight}px`;

                const visibleComputers = computers.slice(currentIndex, currentIndex + maxVisibleComputers);
                const oldestDate = new Date(visibleComputers[0].year);
                const newestDate = new Date(visibleComputers[visibleComputers.length - 1].year);

            for (let i = currentIndex; i < Math.min(currentIndex + maxVisibleComputers, computers.length); i++) {
                const computer = computers[i];

                const eventDiv = document.createElement('div');
                eventDiv.classList.add('timeline-event');

                const eventCircle = document.createElement('div');
                eventCircle.classList.add('timeline-event-circle');

                const dateDiv = document.createElement('div');
                dateDiv.classList.add('timeline-event-date');
                dateDiv.textContent = new Date(computer.year).getFullYear();

                const contentDiv = document.createElement('div');
                contentDiv.classList.add('timeline-event-content');
                contentDiv.innerHTML = `
                <p><strong>Model:</strong> ${computer.model}</p>
                <p><strong>Submodel:</strong> ${computer.submodel}</p>
                `;

                const eventDate = new Date(computer.year);
                const positionPercentage = (eventDate - oldestDate) / (newestDate - oldestDate) * 80;

                arrowLeft.style.display = 'none';
                arrowRight.style.display = 'none';
                eventDiv.style.top = `${positionPercentage}%`;

                eventDiv.appendChild(eventCircle);
                eventDiv.appendChild(dateDiv);
                eventDiv.appendChild(contentDiv);

                const imagePreview = document.createElement('div');
                imagePreview.classList.add('image-preview');
                imagePreview.innerHTML = `<img src="{{ asset('${computer.icon}') }}" alt="Computer Image">`;
                imagePreview.style.display = 'none';

                eventDiv.appendChild(imagePreview);

                eventCircle.addEventListener('mouseover', () => {
                imagePreview.style.display = 'block';
                });
                eventCircle.addEventListener('mouseout', () => {
                imagePreview.style.display = 'none';
                });

                if (i % 2 === 0) {
                computersOne.appendChild(eventDiv);
                } else {
                computersTwo.appendChild(eventDiv);
                }
            }

            
        }
        }

        arrowLeft.addEventListener('click', () => {
            if (currentIndex > 0) {
            currentIndex -= maxVisibleComputers;
            displayComputers();
            }
        });

        arrowRight.addEventListener('click', () => {
            if (currentIndex + maxVisibleComputers < computers.length) {
            currentIndex += maxVisibleComputers;
            } else {
            currentIndex = 0;
            }
            displayComputers();
        });

        toggleButton.addEventListener('click', () => {
            isHorizontalLayout = !isHorizontalLayout;
            timeline.classList.toggle('timeline-horizontal', isHorizontalLayout);
            timeline.classList.toggle('timeline-vertical', !isHorizontalLayout);
            line.classList.toggle('line-horizontal', isHorizontalLayout);
            line.classList.toggle('line-vertical', !isHorizontalLayout);
            computersOne.classList.toggle('computers-above', isHorizontalLayout);
            computersOne.classList.toggle('computers-left', !isHorizontalLayout);
            computersTwo.classList.toggle('computers-below', isHorizontalLayout);
            computersTwo.classList.toggle('computers-right', !isHorizontalLayout);
            displayComputers();
        });

        displayComputers();

        window.addEventListener("resize", displayComputers());
        })
    </script>

    </x-app-layout>
@endif

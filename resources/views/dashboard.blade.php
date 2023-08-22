@if (auth()->user()->is_admin)
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
@include('layouts.app')
    <div class="cta-45">
        <h1>Timeline</h1>

        <div id="toggle-button" class="toggle-button">
        <span>&#8645;</span>
        </div>

        <div id="navigation" class="navigation">
        <button class="arrow arrow-left">&lt;</button>
        <button class="arrow arrow-right">&gt;</button>
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
    <div class="footer-10">
        <div class="card1">
        <div class="links">
            <div class="column5">
            <img class="logo-icon" alt="" src="{{ asset('photo/public/logo1.svg') }}" />
            </div>
            <div class="column6">
            <div class="page-one">Column One</div>
            <div class="footer-links">
                <div class="link4">
                <div class="placeholder">Link One</div>
                </div>
                <div class="link4">
                <div class="placeholder">Link Two</div>
                </div>
                <div class="link4">
                <div class="placeholder">Link Three</div>
                </div>
                <div class="link4">
                <div class="placeholder">Link Four</div>
                </div>
                <div class="link4">
                <div class="placeholder">Link Five</div>
                </div>
            </div>
            </div>
            <div class="column6">
            <div class="page-one">Column Two</div>
            <div class="footer-links">
                <div class="link4">
                <div class="placeholder">Link Six</div>
                </div>
                <div class="link4">
                <div class="placeholder">Link Seven</div>
                </div>
                <div class="link4">
                <div class="placeholder">Link Eight</div>
                </div>
                <div class="link4">
                <div class="placeholder">Link Nine</div>
                </div>
                <div class="link4">
                <div class="placeholder">Link Ten</div>
                </div>
            </div>
            </div>
        </div>
        <div class="newslatter">
            <div class="heading-parent">
            <div class="page-one">Subscribe</div>
            <div class="text">
                Join our newsletter to stay up to date on features and releases.
            </div>
            </div>
            <div class="actions2">
            <div class="form">
                <div class="text-input">
                <div class="placeholder">Enter your email</div>
                </div>
                <div class="button10">
                <div class="link">Subscribe</div>
                </div>
            </div>
            <div class="text4">
                By subscribing you agree to with our
                <span class="privacy-policy">Privacy Policy</span> and provide
                consent to receive updates from our company.
            </div>
            </div>
        </div>
        </div>
        <div class="footer-links">
        <div class="row">
            <div class="credits1">
            <div class="link">© 2023 Relume. All rights reserved.</div>
            <div class="footer-links3">
                <div class="link34">Privacy Policy</div>
                <div class="link34">Terms of Service</div>
                <div class="link34">Cookies Settings</div>
            </div>
            </div>
            <div class="social-links">
            <img
                class="chevron-down-icon"
                alt=""
                src="{{ asset('photo/public/icon--facebook.svg') }}"
            />

            <img
                class="chevron-down-icon"
                alt=""
                src="{{ asset('photo/public/icon--instagram.svg') }}"
            />

            <img
                class="chevron-down-icon"
                alt=""
                src="{{ asset('photo/public/icon--twitter.svg') }}"
            />

            <img
                class="chevron-down-icon"
                alt=""
                src="{{ asset('photo/public/icon--linkedin.svg') }}"
            />
            </div>
        </div>
        </div>
    </div>
    </div>
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
        
        $sql = "SELECT c.id, c.year, c.model, c.submodel FROM computers c INNER JOIN ( SELECT MIN(id) as id, year FROM computers GROUP BY year) min_computers ON c.id = min_computers.id ORDER BY c.year ASC";
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
                const height = '2460';
                document.querySelector('.home').style.height = `${height}px`
                document.querySelector('.cta-45').style.height = `${totalHeight}px`;

                maxVisibleComputers = 8;
                if (window.matchMedia("(max-width: 1600px)").matches) {
                maxVisibleComputers = 6;
                }
                if (window.matchMedia("(max-width: 1200px)").matches) {
                maxVisibleComputers = 4;
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
                    imagePreview.innerHTML = `<img src="${computer.icon}" alt="Computer Image">`;
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
                imagePreview.innerHTML = `<img src="${computer.icon}" alt="Computer Image">`;
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
</body>
</html>
@endif

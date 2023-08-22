@include('layouts.app')
      <div class="product-2">
        <div class="title">
          <div class="section-title">
            <div class="subheading">Tagline</div>
            <div class="content7">
              <b class="heading2">Products</b>
              <div class="text2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </div>
            </div>
          </div>
          <div class="button5">
            <div class="button7">View all</div>
          </div>
        </div>
        <div class="content4">
        </div>
      </div>
      <div class="footer-10">
        <div class="card1">
          <div class="links">
            <div class="column5">
              <img class="logo-icon" alt="" src="./public/logo1.svg" />
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
                src="./public/icon--facebook.svg"
              />

              <img
                class="chevron-down-icon"
                alt=""
                src="./public/icon--instagram.svg"
              />

              <img
                class="chevron-down-icon"
                alt=""
                src="./public/icon--twitter.svg"
              />

              <img
                class="chevron-down-icon"
                alt=""
                src="./public/icon--linkedin.svg"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
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
        
        $sql = "SELECT id, year, model, submodel, icon, manufacturer_id FROM computers";
        $result = $conn->query($sql);

        $computers = array();
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $computers[] = $row;
          }
        }

        $conn->close();
      ?>

      const computers = <?php echo json_encode($computers); ?>;


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

          if (window.matchMedia("(max-width: 1757px)").matches) {
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
              heading1.textContent = computer.manufacturer_id;

              const text1 = document.createElement('div');
              text1.classList.add('text1');
              text1.innerHTML = `<p> ${computer.model} ${computer.submodel}</p>`;

              const year = document.createElement('div');
              year.classList.add('year');
              year.textContent = new Date(computer.year).getFullYear();

              const button3 = document.createElement('a');
              button3.classList.add('button3');
              

              const button7 = document.createElement('div');
              button7.classList.add('button7');
              button7.textContent = 'View';

              const imagePreview = document.createElement('div');
              imagePreview.classList.add('placeholder-image');
              imagePreview.innerHTML = `<img src="${computer.icon}" alt="Computer Image">`;

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
  </body>
</html>

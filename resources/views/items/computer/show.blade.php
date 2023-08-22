<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
    />
  </head>
  <body>
    <div class="home">
      <div class="navbar-11">
        <div class="content">
          <div class="column">
            <img class="logo-icon" id="logo" alt="" src="./public/IcBaselineMenu.svg" />
            <img class="logo-icon" id="logo" alt="" src="./public/COMPUTER101.pdf" />
          </div>
          <div class="column1">
            <div class="button">
              <div class="link">Login</div>
            </div>
            <div class="button2">
              <div class="link">Register</div>
            </div>
          </div>
        </div>
        <div class="content1" id="dropdown">
          <div class="menu">
            <div class="menu-item">
              <img
                class="chevron-down-icon"
                alt=""
                src="./public/IcRoundHome.svg"
              />

              <a href="index.php"><div class="content2">
                <div class="page-one">Home</div>
              </div></a>
            </div>
            <div class="menu-item">
              <img
                class="chevron-down-icon"
                alt=""
                src="./public/PhComputerTowerFill.svg"
              />

              <a href="index.php"><div class="content2">
                <div class="page-one">Items</div>
              </div></a>

              <img id="dropbtn"
                class="chevron-down-icon"
                alt=""
                src="./public/BxChevronRight.svg"
              />
            </div>
            <div class="hide">
              <div class="menu-item">
                <img
                  class="chevron-down-icon"
                  alt=""
                  src="./public/IcBaselineComputer.svg"
                />
                <a href="index.css"><div class="content2">
                  <div class="page-one">Computers</div>
                </div></a>
                </div>
                <div class="menu-item">
                <img
                  class="chevron-down-icon"
                  alt=""
                  src="./public/IcBaselineKeyboard.svg"
                />
                <a href="index.css"><div class="content2">
                  <div class="page-one">Keyboards</div>
                </div></a>
                </div>
                <div class="menu-item">
                <img
                  class="chevron-down-icon"
                  alt=""
                  src="./public/BxBxsJoystick.svg"
                />
                <a href="index.css"><div class="content2">
                  <div class="page-one">Joysticks</div>
                </div></a>
                </div>
                <div class="menu-item">
                <img
                  class="chevron-down-icon"
                  alt=""
                  src="./public/IcBaselineMonitor.svg"
                />
                <a href="index.css"><div class="content2">
                  <div class="page-one">Monitors</div>
                </div></a>
              </div>
            </div>
            <div class="menu-item">
              <img
                class="chevron-down-icon"
                alt=""
                src="./public/BxImages.svg"
              />

              <a href="index.css"><div class="content2">
                <div class="page-one">Image Gallery</div>
              </div></a>
            </div>
            <div class="menu-item">
              <img
                class="chevron-down-icon"
                alt=""
                src="./public/HeroiconsGlobeEuropeAfrica20Solid.svg"
              />

              <a href="index.css"><div class="content2">
                <div class="page-one">Visit Us</div>
              </div></a>
            </div>
            <div class="menu-item">
              <img
                class="chevron-down-icon"
                alt=""
                src="./public/IcBaselineLocalPhone.svg"
              />

              <a href="index.css"><div class="content2">
                <div class="page-one">Contact Us</div>
              </div></a>
            </div>
            <div class="menu-item">
              <img
                class="chevron-down-icon"
                alt=""
                src="./public/HeroiconsUserGroup20Solid.svg"
              />

              <a href="index.css"><div class="content2">
                <div class="page-one">About Us</div>
              </div></a>
            </div>
          </div>
        </div>
      </div>
      <div class="header-56">
        <div class="content6">
          <div class="column3">
            <b class="heading">101 Computers</b>
          </div>
          <div class="column4">
            <div class="text">
              Welcome to 101Computers, where technology knows no bounds. Embark on a journey through our curated collection of historic computers.
            </div>
            <div class="actions">
              <div class="button4">
                <div class="link">View Gallery</div>
              </div>
              <div class="button6">
                <div class="link">Tour</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-102">
        <div class="container">
          <div class="column2">
            <div class="content3">
              <b class="heading1">Basic Info</b>
              <div class="text1">
                <strong>Manufacturer: </strong> {{$computer->manufacturers->name}} <br>
                <strong>Model: </strong> {{$computer->model}} <br>
                <strong>Submodel: </strong> {{$computer->submodel}} <br>
                <strong>Year: </strong> {{$computer->year}} <br>
                <strong>Serial Number: </strong> {{$computer->serial_number}} <br>
              </div>
              <b class="heading1">Additional Info</b>
              <div class="text1">
                <strong>Power Type: </strong> {{$computer->power_type}} <br>
                <strong>Power Rating: </strong> {{$computer->power_rating}} <br>
                <strong>Speed: </strong> {{$computer->speed}} <br>
                <strong>Bits: </strong> {{$computer->bit}} <br>
                <strong>Description: </strong> {{$computer->description}} <br>
                <strong>Issues: </strong> {{$computer->issues->description}} <br>
              </div>
              <b class="heading1">Position Info</b>
              <div class="text1">
                <strong>Inventory Number: </strong> {{$computer->inventory_number}} <br>
                <strong>Position: </strong> {{$computer->bool_position ? 'Container' : 'Shelf'}} <br>
                <strong>Position Code: </strong> {{$computer->position_id}} <br>
              </div>
              <b class="heading1">Belongs To</b>
              <div class="text1">
                <strong>Keyboard: </strong> {{$computer->keyboard}} <br>
                <strong>Monitor: </strong> {{$computer->monitor}} <br>
                <strong>Other Pheripherals: </strong> {{$computer->year}} <br>
              </div>
            </div>
          </div>
          <div class="column7">
            <img
              class="placeholder-image"
              alt=""
              src="{{ asset($computer->icon) }}"
            />

            <div class="row2">
              <div class="content4">
                <div class="text2">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </div>
              </div>
              <div class="content5">
                <div class="slider-dots">
                  <div class="dot"></div>
                  <div class="dot1"></div>
                  <div class="dot1"></div>
                </div>
                <div class="slider-buttons">
                  <div class="button8">
                    <img class="icon1" alt="" src="./public/icon.svg" />
                  </div>
                  <div class="button8">
                    <img class="icon1" alt="" src="./public/icon1.svg" />
                  </div>
                </div>
              </div>
            </div>
          </div>
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
  </body>
</html>

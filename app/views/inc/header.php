<?php
echo '
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid">
        <a class="navbar-brand w-25" href="'. APPROOT .'/pages/index"
          ><img src="'. URLROOT .'/img/logo.png" class="ms-4" alt="logo" width="180"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active fw-bolder" href="'. APPROOT .'/pages/index">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">ABOUT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">CLASSES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="schedule.php">SCHEDULE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">TRAINERS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">STORE</a>
            </li>
          </ul>
          <form class="d-flex flex-column flex-lg-row">
            <div
              class="search d-flex justify-content-center align-items-center"
            >
              <svg
                class="searchIcon"
                xmlns="http://www.w3.org/2000/svg"
                x="0px"
                y="0px"
                width="50"
                height="50"
                viewBox="0 0 172 172"
                style="fill: #000000"
              >
                <g
                  fill="none"
                  fill-rule="nonzero"
                  stroke="none"
                  stroke-width="1"
                  stroke-linecap="butt"
                  stroke-linejoin="miter"
                  stroke-miterlimit="10"
                  stroke-dasharray=""
                  stroke-dashoffset="0"
                  font-family="none"
                  font-weight="none"
                  font-size="none"
                  text-anchor="none"
                  style="mix-blend-mode: normal"
                >
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#ff7800">
                    <path
                      d="M72.24,10.32c-32.26344,0 -58.48,26.21656 -58.48,58.48c0,32.26344 26.21656,58.48 58.48,58.48c12.76563,0 24.56375,-4.11187 34.185,-11.0725l45.2575,45.15l9.675,-9.675l-44.72,-44.8275c8.78813,-10.23937 14.0825,-23.52906 14.0825,-38.055c0,-32.26344 -26.21656,-58.48 -58.48,-58.48zM72.24,17.2c28.54125,0 51.6,23.05875 51.6,51.6c0,28.54125 -23.05875,51.6 -51.6,51.6c-28.54125,0 -51.6,-23.05875 -51.6,-51.6c0,-28.54125 23.05875,-51.6 51.6,-51.6z"
                    ></path>
                  </g>
                </g>
              </svg>
              <div class="input d-flex align-items-center">
                <input type="text" placeholder="Search .." id="mysearch" />
              </div>
            </div>
            <div id="separator" class="ms-2 me-2"></div>
            <br class="d-block d-lg-none" />
            <a href="#">
              <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAADLElEQVRoge2YT0gUURzHP88VxaSDRXSSKOsQBHapsENHg7oUFNIpEcLoDwRljglhha27FkZiQXWwq0Ydw8hbh0qIoiAkysIuEaKIWFa7vw7rn9lxZva92ZmNcD+nne+b93vf3/7m7fvNQpEiKxu18EEsUkCJyz1zKKpVnO+Fs6WP3bB43FOO0FgIM0HQSQDgpBwmFrWZIOgmsIHN7I3aTBCU14BY9ANHC+jFi09As+riqdug26ZdGLkZlSNDNiHc8Rr0TEBd5RUwEoklU0pIew/5cytkK8EQbnsNee4BADlNOZWMA+tsMxpVnPvhuXOsafEQOLgkMMYsW1Uvc273+1ZgflK/Qz6Rr0kvpI064IBDtrzMQ+5HCGL0AamlVdgpFjsCevREQCFcI/upeEGCQb95ORNQnXwBhhxy+FVo5QiwO0sTzin/80mjAgCKPofSIG2sNfHnh3RQRgmXs0UeqATPcs3VSyDOY+CDTalAaDIx6cscZxBqbMov0lzQmaqVwHwZ7zrkUPojsagCWh1yn+rO+sI80atAhnvArO06nP5IcQlhzeK1MIWiU3e6dgKqi0lgIEuU/DaztFCD0OxwdEXFmdCNYVIBKKHXoeyTFrYYxbAToxsoW7wWxphZ9oPhi+9J7IZYvITwz4FMcBpUwlHlHJhVIINnZ5gnz3MdWm6YJyCRvNhMk6Yp16HlhlEC0sp+FIdMF/EOyBTwCMUuleR9kBDae0A6WMUP3qHYaJNH+EidGrT1SgVGvwI/uegw/wfh2L80D5oJyHlWA6eyRW6oBG+iMGWCXgVibAMqbco3UnRE4siQUq270sw6dst6SpkRKwpLGVSX3v7Uq0AFb4HP+RiKCr1utIM0wnHgd8R+jNFv5hIMkWYP8ASYjs5Skf8Lo25U2qkmRQ9QnxEYRrBUktEgi4cRT7+VaKeaNK+z3p4yTBKjVnUyrhsrzHj6rUSKHpfFAKpIcV07TsjxTLrRep+xIC12KPGCvNC4YdzHhxVPPwFh2HNMLfvnrmDxTBKwgEmXkQlSnNWOE3I8/ZM4ySgxaoFBMifxNIoB0mxXSb7qxokqXpEiK5W/f0fh1nanwqoAAAAASUVORK5CYII="
              />
            </a>
          </form>
        </div>
      </div>
    </nav>
  </header>';
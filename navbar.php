<nav>
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="./?p=about">ABOUT</a></li>
          <li><a href="./?p=galery">GALLERY</a></li>
          <li><a href="./?p=shop">SHOP</a></li>
          <li class="user-status">
            <?php
            if (!isset($_SESSION["uid"])) {
                echo '<ion-icon name="person"></ion-icon>';
            } else {
                echo "<p style='width: 5rem; color: red; font-size: 1rem;'>".$_SESSION["unick"]."</p>";
            }
            ?>
            <div class="submenu">
              <a href="regisztracio.php">Regisztráció</a>
              <?php
              if (!isset($_SESSION["uid"])) {
                  echo '<a href="bejelentkezes.php">Bejelentkezés</a>';
              } else {
                  echo '<a href="kijelentkezes.php">Kijelentkezés</a>';
              }
              ?>
            </div>
          </li>
        </ul>
      </nav>
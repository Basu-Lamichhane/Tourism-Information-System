<?php
if (isset($_GET['type'])) {
    if ($_GET['type'] == "place" || $_GET['type'] == "accommodation" || $_GET['type'] == "district" || $_GET['type'] == "cafe" || $_GET['type'] == "user") {
        ?>
        <div  class='addPlace'> <a href="add_destination.php?type="<?php echo $_GET['type']; ?>></a> <svg xmlns='http://www.w3.org/2000/svg' height='4em' viewBox='0 0 512 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z'/></svg> </a> </div>
        <?php
    }
}
?>
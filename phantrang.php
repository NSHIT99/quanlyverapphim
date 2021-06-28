<div id="phantrang">
          <?php
          if ($current_page > 1) {
              $prev_page = $current_page - 1;
              ?>
              <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Prev</a>
          <?php }
          ?>
          <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
              <?php if ($num != $current_page) { ?>
                  <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                      <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
                  <?php } ?>
              <?php } else { ?>
                  <strong class="current-page-page-item"><?= $num ?></strong>
              <?php } ?>
          <?php } ?>
          <?php
          if ($current_page < $totalPages) {
              $next_page = $current_page + 1;
              ?>
              <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Next</a>
          <?php
          }
          ?>
</div>
<style type="text/css">
  #phantrang a:hover{
    background-color: #db7093;
    color: white;
  }
  .page-item{
    text-decoration: none;
    border: 2px solid black;
    color: black;
  }
  .current-page-page-item{
    color: red;
  }
</style>
 <?php
  $sql_query = 'SELECT * FROM item';
  $result = mysqli_query($conn, $sql_query);

  ?>

 <div class="order_modal">
   <section>
     <dialog class="modal">
       <span class="material-symbols-outlined close-btn">
         close
       </span>
       <div class="modal_menu_items">
         <?php
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
             <div class="modal_menu_item">
               <div class="modal_menu_item_img">
                 <img src="./uploads/<?= $row['image'] ?>" alt="Food Item Image" />
               </div>
               <div class="modal_menu_text">
                 <div>
                   <h4 class="modal_menu_item_name"><?= $row['name'] ?></h4>
                   <span class="modal_menu_item_price">$<?= $row['price'] ?></span>
                 </div>
               </div>
             </div>
         <?php }
          } ?>
       </div>
     </dialog>
   </section>
 </div>
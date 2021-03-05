<?php include 'includes/header.php' ?>
<div class="main" id="maincontent">
    <div class="main-section">
        <div class="add-section">
            <form action="app/add.php" method="POST" autocomplete="off">
            <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <label for="title">To Do*</label>
                <input type="text" id= "title" name="title" 
                style="border-color: #ff6666"
                placeholder="This is required" aria-label="You need to create a to do!"/> 

                <label for="month">Month</label>
                <input type="text" id="month" name="month" placeholder="Month Not Required" aria-label="Enter a month if needed"/>
                
                <label for="yer">Year</label>
                <input type="text" id="year" name="year" placeholder="Year Not Required" aria-label="Enter a year if needed"/>

                <button type="submit" aria-label="Enter"> &plus; </button>

                <?php }else{ ?>
                <label for="title">To Do*</label>
                    <input type="text" id= "title" name="title" placeholder="Enter a To Do" aria-label="Enter a To Do"/>
                
                <label for="month">Month</label>    
                    <input type="text" id="month" name="month" placeholder="Enter Month [1-12]" aria-label="Enter month if needed for your to do"/>  
                
                <label for="year">Year</label>     
                    <input type="text" id="year" name="year" placeholder="Enter Year [yyyy]" aria-label="Enter a year if needed for your to do"/>

                <button type="submit" aria-label="Enter"> &plus; </button>
                    
                <?php } ?>
            </form>

        </div>  
        <?php
            $todos = $conn->query("SELECT * FROM todos WHERE future_datetime IS NULL ORDER BY id DESC"); 
        ?>
        <div class="show-todo-section">
        <?php if($todos->rowCount() <= 0){?>
            <div class="todo-item">
                <div class="empty">
                    <img src="img/f.jpg" alt="Notebook" width="100%" height="250px" />
                    <img src="img/g.gif" alt="Ecllipse gif" width="80%" height="150px" />
                </div>
        </div>
        <?php } ?>  

        <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="todo-item">
                <span id="<?php echo $todo['id']; ?>" class="remove-to-do">x</span>

                <?php if($todo['checked']) { ?> 
                    <input type="checkbox" data-todo-id="<?php echo $todo['id']; ?>" class="check-box" checked />

                    <h2 class="checked"><?php echo $todo['title'] ?></h2>

                <?php }else{ ?>
                    <input type="checkbox" data-todo-id="<?php echo $todo['id']; ?>" class="check-box">
                    <h2><?php echo $todo['title'] ?></h2>

                <?php } ?>
                <br>
                <small>Created: <?php echo $todo['date_time'] ?> &nbsp; </small> <!---->
            </div>    
        <?php } ?>   
    </div>

</div><!--Main Section-->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script>
      $(document).ready(function(){
          $('.remove-to-do').click(function(){
              const id = $(this).attr('id');

             $.post("app/remove.php",
                {
                    id: id
                },
                (data) =>{
                    if(data){
                        $(this).parent().hide(600);
                    }
                }         
             );  
          });
          $(".check-box").click(function(e){
            const id = $(this).attr('data-todo-id');  
            
            $.post("app/check.php",
                {
                    id: id
                },
                (data) =>{
                    if(data != 'error'){
                        const h2 = $(this).next();
                        if(data === '1'){
                            h2.removeClass('checked');
                        }else{
                            h2.addClass('checked');
                        }
                    }
                }
            );
          });


      });
  </script>
<?php include 'includes/footer.php' ?>

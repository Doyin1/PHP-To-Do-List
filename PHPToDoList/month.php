<?php include 'includes/header.php' ?>
<div class="main" id="maincontent">
    <div class="main-section">
    <H1>Month</H1>

    <?php
        $year = date("Y");
        $todos = $conn->query("SELECT * FROM todos WHERE future_datetime BETWEEN '$year-01-01' AND '$year-12-31' ORDER BY future_datetime ASC"); 
    ?>
    <div class="show-todo-section">
        <?php if($todos->rowCount() <= 0){?>
            <div class="todo-item">
                <div class="empty">
                    <p>Enter a To Do!</p>
                </div>
            </div>
        <?php } ?>  
        
        <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
            <?php if($todos->rowCount() <= 4){?>
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
                    <small>Complete by: <?php echo $todo['future_datetime'] ?>  </small> <!---->
                </div>
            <?php } ?>    
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
    </div>
</div>
<?php include 'includes/footer.php' ?>
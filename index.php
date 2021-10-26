
<?php
   session_start();
     echo $_SESSION['output'];
     echo  $_SESSION['empty'];
?>

 <?php
    $_SESSION['output'] = "";
    $_SESSION['empty'] = "";
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<style>

</style>
</head>
<body>

<?php
    if(isset($_GET['delete'])){
            $Dbconn = mysqli_connect('localhost','root','','todo_list');
            $id = $_GET['delete'];
            mysqli_query($Dbconn,"DELETE FROM todos WHERE id=$id");

        }
    ?>

<form action="insert.php" method ="post">
<div id="myDIV" class="header">
  <h2 style="margin:5px">Todo List</h2>
  <input type="text" name ="taskname">  
  <button name = "submit" class="addBtn">Add</button>
</div>
</form>
<p class="text-danger">Note : You have Finish Task. After Click Completed CheckBox (or) Today You have Finish All Task. Delete Button Click Permenent Deleted In Database </p>
   <div class="container" style="padding:30px 0;">
       <div class="row">
           <div class="col-md-6">
               <div class="panel panel-default">
                   <div class="panel-heading">
                   <div class="row">
                         <div class="col-md-6">
                            <strong>Task List</strong>
                         </div>
                  </div>
                  <div class="panel-body">
                          <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>Sno</th>
                                  <th>Task Name</th>
                                  <th>Completed</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                             $Dbconn = mysqli_connect('localhost','root','','todo_list'); 
                             $read = "SELECT * FROM todos";
                             $view = mysqli_query($Dbconn,$read);
                             $i = 1;
                             while($output= mysqli_fetch_assoc($view)){
                            ?>
                            <tr>
                            <td><?php echo $output['id']?> </td>
                            <td><?php echo $output['taskname']?></td>
                            <td><input type="checkbox"></td>
                            <td> <a href="index.php?delete=<?php echo $output['id']; ?>" class = "btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                            <?php
                            }
                            ?>
                          </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
    </div>
</body>
</html>

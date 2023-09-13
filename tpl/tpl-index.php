<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?=SITE_TITLE?></title>
  <link rel="stylesheet" href="../assets/css/styles.css" type="text/css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">akosheta</span>
    <img src="../assets/img/profile.jpg" width="40" height="40"/></div>
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">Folders</div>
        <ul class="folder-list">
          <li class="<?=!isset($_GET['folder_id']) ? 'active' : ''; ?>">
            <a href="<?=BASE_URL?>" class="folder-a"><i class="<?= !isset($_GET['folder_id']) ? 'fa fa-folder-open': 'fa fa-folder' ; ?>"></i>All Tasks</a>
          </li>
          <?php foreach ($folders as $folder): ?>
          <li class="<?php if (isset($_GET['folder_id']) && $_GET['folder_id'] == $folder->id){echo 'active';}?>">
            <a href="?folder_id=<?= $folder->id ?>" class="folder-a"><i class="<?php if (isset($_GET['folder_id']) && $_GET['folder_id'] == $folder->id){echo 'fa fa-folder-open';}else{echo 'fa fa-folder';}?>"></i><?= $folder->name ?></a>
            <a href="?delete_folder=<?= $folder->id ?>" class="folder-delete" onclick="return confirm('Are you sure to delete <?= $folder->name ?> folder and all tasks related?')"><i class="fa fa-trash-o"></i></a>
          </li>
          <?php endforeach; ?>
          <!-- <li> <i class="fa fa-folder"></i>Folder</li> -->
        </ul>
      </div>
      <div class="add-folder">
        <div>
          <input class="new-folder-input" type="text" placeholder="Add New Folder"/>
          <button class="new-folder-btn">Add</button>
        </div>
      </div>
    </div>
    <div class="view">
      <!-- <div class="viewHeader">
        <div class="title">Manage Tasks</div>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button">Completed</div>
          <div class="button inverz"><i class="fa fa-trash-o"></i></div>
        </div>
      </div> -->
      <div class="content">
        <div class="list">
          <div class="title"><?= isset($_GET["folder_id"]) ? "Tasks" : "All tasks" ; ?></div>
          <div>
            <!-- <button class="button active">Add New Task</button> -->
            <?php if(isset($_GET["folder_id"])): ?>
            <div class="container">
                <button id="add-task">Add New Tasks</button>
              <div  class="window-task">
                <h2 class="title-window">New Task</h2>
                <input type="text" name="title-text" id="input-text" placeholder="Title">
                <textarea name="content" id="text-content" cols="30" rows="10" placeholder="Task description"></textarea>
                <div class="button-group">
                    <button type="button" class="btn btn-outline-success" id="add-new-task">Add</button>
                    <button type="button" class="btn btn-outline-danger">Close</button>
                </div>
                      <span class="succes">Added successfully</span>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <ul class="task-list">
            <?php if(sizeof($tasks)): ?>
              <?php foreach($tasks as $task): ?>
                <li class="<?= $task->is_done ? 'checked' : '' ; ?>">
                  <i class="<?= $task->is_done ? 'fa fa-check-square-o': 'fa fa-square-o'; ?>"></i>
                  <span class="task-title"><?= $task->title ?></span>
                  <span class="task-body"><?= $task->body ?></span>
                  <div class="info">
                    <div class="<?= $task->is_done ? 'button green' : 'button'; ?> "><?= $task->is_done ? 'Completed' : 'Pending';  ?></div>
                    <span><?=$task->is_done ? "Complete by $task->end_at": "Created at $task->created_at" ; ?></span>
                  </div>
                  <div class="delete-task">
                    <a href="?delete_task=<?= $task->id ?>" onclick="return confirm('Are you sure to delete this task?\n<?= $task->title ?>')"><i class="fa fa-trash-o"></i></a>
                  </div>
                </li>
              <?php endforeach; ?>
            <?php else:?>
              <span class="no-task">There is no Task here ...</span>
            <?php endif; ?>
            <!-- <li><i class="fa fa-square-o"></i><span>Design a new logo</span>
              <div class="info">
                <div class="button">Pending</div><span>Complete by 10/04/2014</span>
              </div>
            </li>
            <li><i class="fa fa-square-o"></i><span>Find a front end developer</span>
              <div class="info"></div>
            </li> -->
          </ul>
        </div>
        <!-- <div class="list">
          <div class="title">Tomorrow</div>
          <ul>
            <li><i class="fa fa-square-o"></i><span>Find front end developer</span>
              <div class="info"></div>
            </li>
          </ul>
        </div> -->
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="../assets/js/script.js"></script>
  <script>
    $(document).ready(function() {
      $(".new-folder-btn").click(function(e){
        var newFolderinput = $(".new-folder-input");
        $.ajax({
          url: "../proccess/ajaxHandler.php" ,
          method: "POST",
          data: {action: "addfolder" ,input: newFolderinput.val()},
          success: function(response){
            if (response == "1") {
              $('<li><a href="?folder_id=<?=$folder->id?>" class="folder-a"><i class="fa fa-folder"></i>'+newFolderinput.val()+'</a><a href="?delete_folder=<?=$folder->id?>" class="folder-delete"><i class="fa fa-trash-o"></i></a></li>').appendTo("ul.folder-list");
            }else{
              alert(response);
            }
          }
        });
      });
    });
  </script>
  <script>
        const button_add_task = document.getElementById('add-task');
        const task_window = document.querySelector('.window-task');
        let btn_close = task_window.querySelector('.btn-outline-danger');
        let btn_add = task_window.querySelector('.btn-outline-success');
        let succes = task_window.querySelector('.succes');

        // btn_add.addEventListener('click' , function() {
        //     succes.classList.toggle('select')
        //     setTimeout(() => {
        //         task_window.classList.remove('active');    
        //         button_add_task.style.display = 'block';
        //         console.log('successfully added')
        //     } , 2000)
        // })
        btn_close.addEventListener('click' , () => {
            task_window.classList.remove('active');
            button_add_task.style.display = 'block';
            succes.classList.remove('select');
        })
        button_add_task.addEventListener('click' , () => {
            task_window.classList.toggle('active');
            button_add_task.style.display = 'none';
        }) 

    </script>
    <script>
        // const regex = /q=([^&#]*)/;
        // const matched = location.search.match(regex);
        // var folderId = matched[1].valueOf();
      $(document).ready(function(){ 
        $("#add-new-task").click(function(e){
          var taskTitle = $("#input-text");
          var taskBody = $("#text-content");
          $.ajax({
            url : "../proccess/ajaxHandler.php",
            method : "POST",
            data : {action: "addtask" , title : taskTitle.val(), body : taskBody.val()},
            success : function(response){
              if (response == "1") {
                $('<li class="<?= $task->is_done ? 'checked' : '' ; ?>"> <i class="<?= $task->is_done ? 'fa fa-check-square-o': 'fa fa-square-o'; ?>"></i> <span class="task-title">'+taskTitle.val()+'</span> <span class="task-body">'+taskBody.val()+'</span><div class="info">'+'<div class="<?= $task->is_done ? 'button green' : 'button'; ?> "><?= $task->is_done ? 'Completed' : 'Pending';  ?></div> <span><?=$task->is_done ? "Complete by $task->end_at": "Created at $task->created_at" ; ?></span> </div> <div class="delete-task"> <a href="?delete_task= ><i class="fa fa-trash-o"></i></a> </div> </li>').appendTo("ul.task-list");
              } else {
                alert(response);
              }
            }
          });
        });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

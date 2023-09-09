<!DOCTYPE html>
<html lang="en" >
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
          <?php foreach ($folders as $folder): ?>
          <li>
            <a href="?folder_id=<?= $folder->id ?>" class="folder-a"><i class="fa fa-folder"></i><?= $folder->name ?></a>
            <a href="?delete_folder=<?= $folder->id ?>" class="folder-delete"><i class="fa fa-trash-o"></i></a>
          </li>
          <?php endforeach; ?>
          <!-- <li> <i class="fa fa-folder"></i>Folder</li>
          <li class="active"> <i class="fa fa-folder-open"></i>Folder</li> -->
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
          <div class="title">Today</div>
          <div class="functions">
            <div class="button active">Add New Task</div>
          </div>
          <ul>
            <?php foreach($tasks as $task): ?>
              <li class="<?= $task->is_done ? 'checked' : '' ; ?>">
                <i class="<?= $task->is_done ? 'fa fa-check-square-o': 'fa fa-square-o'; ?>"></i>
                <span class="task-title"><?= $task->title ?></span>
                <span class="task-body"><?= $task->body ?></span>
                <div class="info">
                  <div class="<?= $task->is_done ? 'button green' : 'button'; ?> "><?= $task->is_done ? 'Completed' : 'Pending';  ?></div>
                  <span><?=$task->is_done ? "Complete by $task->end_at": '' ; ?></span>
                </div>
                <div class="delete-task">
                  <a href="?delete_task=<?= $task->id ?>"><i class="fa fa-trash-o"></i></a>
                </div>
              </li>
            <?php endforeach; ?>
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
</body>
</html>

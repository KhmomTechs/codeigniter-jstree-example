<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<section class="content-header">
    <h1>
        Hierarchy View
    </h1>
</section>

<div class="container-fluid">
    <form id="treeview" name="treeview" action="" method="post">
        View 3 level hierarchy of
        <select name="userID" id="userID">
            <?php
            foreach ($userList as $user) {
                ?>
                <option value="<?php echo $user->userID; ?>" <?php
                echo ($user->userID === $userID ? 'selected="selected"' : "");
                ?>><?php echo $user->userName; ?></option>
                        <?php
                    }
                    ?>
        </select>
        <input type="submit" value="View" />
    </form>
    <div class="row">
        <div id="jstree">
            <?php
            echo array2jstree($jstree);
            ?>
        </div>

    </div>
</div>
<script>
    $(function () {
        // create an instance when the DOM is ready
        $('#jstree').jstree();
        // bind to events triggered on the tree
        $('#jstree').on("changed.jstree", function (e, data) {
            console.log(data.selected);
        });
        // collapse all
        $('#jstree').on('ready.jstree', function () {
            $("#jstree").jstree("open_all");
        });
    });
</script>

<style>

    .table td img {
        width: 100px;
        height: 100px;
        border-radius: 0%;
    }
</style>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-5">
                    <h2> <?php echo(!empty($title) ? $title : false) ?></h2>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">
                            &nbsp;/&nbsp;<?php echo(!empty($title) ? $title : false) ?>&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor"> <?php echo(!empty($title_child) ? '/' . $title_child : false) ?></p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= (!empty($title_child) ? $title_child : '') ?></h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên Tài khoản</th>
                            <th>Email</th>
                            <th>Vai Trò</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php


                        if (!empty($user_list)) {
                            foreach ($user_list as $key => $userItem) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td class="py-1"><?= $userItem['name'] ?></td>
                                    <td><?= $userItem['email'] ?></td>
                                    <td><?php
                                        if (!empty($role_user)) {
                                            foreach ($role_user as $roleUserItem) {
                                                if($userItem['id']==$roleUserItem['user_id']){
                                                    if(!empty($role_list)){
                                                    foreach ($role_list as $roleItem){
                                                        if($roleUserItem['role_id'] == $roleItem['id']){
                                                            if($roleItem['id']==1){
                                                                echo '<label class="badge badge-success">'. $roleItem['display_name'].'</label>';
                                                            }else if($roleItem['id']==2){
                                                                echo '<label class="badge badge-primary">'. $roleItem['display_name'].'</label>';
                                                            }
                                                            else if($roleItem['id']==3){
                                                                echo '<label class="badge badge-danger">'. $roleItem['display_name'].'</label>';
                                                            }
                                                            else if($roleItem['id']==4){
                                                                echo '<label class="badge badge-warning">'. $roleItem['display_name'].'</label>';
                                                            }else{
                                                                    echo '<label class="badge badge-info">'. $roleItem['display_name'].'</label>';

                                                            }


                                                        }
                                                    }}
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo _WEB_ROOT ?>/admin/users/viewUser/<?= $userItem['id'] ?>">
                                            <button class="btn btn-primary">Xem</button>
                                        </a>

                                        <a href="<?php echo _WEB_ROOT ?>/admin/users/delete/<?= $userItem['id'] ?>"
                                           data-url="<?php echo _WEB_ROOT ?>/admin/users/delete/<?= $userItem['id'] ?>"
                                           class="btn btn-danger actionDelete">Xoá</a>

                                    </td>

                                </tr>
                            <?php }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

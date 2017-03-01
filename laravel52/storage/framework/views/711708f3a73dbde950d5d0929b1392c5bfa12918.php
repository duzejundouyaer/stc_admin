<!-- $Id: goods_list.htm 17126 2010-04-23 10:30:26Z liuhui $ -->

<link rel="stylesheet" href="<?php echo e(asset('style/admin/css/ecshop.css')); ?>">
<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
    <!-- start goods list -->
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>
                    <a href="javascript:(0); ">厅号</a>
                </th>
                <th><a href="javascript:(0);">是否正常</th>
                <th><a href="javascript:(0);">操作</th>
            <tr>
            <?php foreach($homeList as $k=>$v): ?>
            <tr>
                <td><?php echo e($v->home_name); ?></td>
                <td class="first-cell" style="">
                    <?php if($v->is_open == 1): ?>
                        <img src="<?php echo e(asset('style/admin/images/yes.jpg')); ?>" alt="" width="20" height="20">
                        <?php else: ?>
                        <img src="<?php echo e(asset('style/admin/images/no.gif')); ?>" alt="" width="20" height="20">
                        <?php endif; ?>
                </td>
                <td class="first-cell">
                    <a href="homeCourse?home_id=<?php echo e($v->home_id); ?>">安排场次</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr><td class="no-records" colspan="10"></td></tr>
        </table>
        <!-- end goods list -->

        <!-- 分页 -->
        <?php /*<table id="page-table" cellspacing="0">*/ ?>
            <?php /*<tr>*/ ?>
                <?php /*<td align="right" nowrap="true">*/ ?>
                    <?php /*{include file="page.htm"}*/ ?>
                <?php /*</td>*/ ?>
            <?php /*</tr>*/ ?>
        <?php /*</table>*/ ?>
    </div>

　
</form>
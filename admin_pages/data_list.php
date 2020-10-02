<div class="card">
  <div class="card-header" style="padding: 0.75rem 1.25rem;">
    <?php echo $title; ?>
  </div>
  <div class="card-body" style="padding:0;">
    <table class="table table-striped table-dark table-hover">
      <tbody>
        <?php
          foreach ($data as $key => $value) {
            ?>
            <tr>
                <?php if(!empty($value->image)): ?>
                  <td  style="width:70px;">
                    <img src="<?php echo $value->image; ?>" style="width:70px;">
                  </td>
                <?php endif; ?>
              <td><?php echo $value->name; ?></td>
              <td width="200">
                <?php if($value->url != null ): ?>
                <a  target="blank" class="btn btn-primary btn-sm submit" href="<?php echo $value->url; ?>" class="btn btn-default">View</a>
                <?php endif; ?>
                <?php if($value->edit_url != null ): ?>
                <a  class="btn btn-info  btn-sm submit" href="<?php echo $value->edit_url; ?>" class="btn btn-default">Edit</a>
                <?php endif; ?>
                <?php if($value->delete_url != null ): ?>
                <a  class="btn btn-danger  btn-sm submit" href="<?php echo $value->delete_url; ?>" class="btn btn-default">Delete</a>
                <?php endif; ?>
              </td>
            </tr>
            <?php
          }
        ?>
        
      </tbody>
    </table>

  </div>
</div>

<div class="wrap">
  <h1>設備管理</h1>
  <form method="get">
    <input type="hidden" name="page" value="ap-device-search" />
    <input type="text" name="keyword" value="<?php echo esc_attr($keyword ?? ''); ?>" placeholder="關鍵字（編號/員工/部門）" />
    <button class="button">查詢</button>
  </form>
  <table class="widefat">
    <thead>
      <tr>
        <th>ID</th><th>設備編號</th><th>部門</th><th>員工</th><th>OS</th><th>CPU</th><th>RAM</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($devices)): foreach ($devices as $d): ?>
        <tr>
          <td><?php echo esc_html($d['id']); ?></td>
          <td><?php echo esc_html($d['device_code']); ?></td>
          <td><?php echo esc_html($d['department']); ?></td>
          <td><?php echo esc_html($d['employee_name']); ?></td>
          <td><?php echo esc_html($d['os']); ?></td>
          <td><?php echo esc_html($d['cpu']); ?></td>
          <td><?php echo esc_html($d['ram']); ?></td>
        </tr>
      <?php endforeach; else: ?>
        <tr><td colspan="7">尚無資料</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

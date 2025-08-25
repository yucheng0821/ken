<div class="ap-devices">
  <h2>設備列表</h2>
  <ul>
    <?php if (!empty($devices)): foreach ($devices as $d): ?>
      <li>
        <strong><?php echo esc_html($d['device_code']); ?></strong>
        — <?php echo esc_html(($d['employee_name'] ?: '未分配') . ' / ' . ($d['department'] ?: '-')); ?>
      </li>
    <?php endforeach; else: ?>
      <li>尚無資料</li>
    <?php endif; ?>
  </ul>
</div>

<?php
$jsonString = file_get_contents('https://house-778.org/base/sidebar.json');
$data = json_decode($jsonString, true);
?>

<div id="sidenav" class="sidenav">
    <?php if (isset($data['outside'])): ?>
        <?php foreach ($data['outside'] as $outsideLink): ?>
            <a href="<?php echo htmlspecialchars($outsideLink['url']); ?>">
                <?php echo htmlspecialchars($outsideLink['title']); ?>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (isset($data['sections'])): ?>
        <?php foreach ($data['sections'] as $index => $section): ?>
            <div class="side-nav-section">
                <?php if($section['section'] !== "Bottom"): ?>
                    <a onclick="toggleSection(<?php echo $index; ?>)" class="side-nav-header">
                        <?php echo htmlspecialchars($section['section']); ?>
                    </a>
                <?php endif; ?>

                <div id="section-<?php echo $index; ?>" class="side-nav-content" style="<?php echo $section['section'] == "Bottom" ? 'display: block;' : 'display: none;'; ?>">
                    <?php if($section['section'] == "Bottom"):?>
                        <!-- join code used to be here  -->
                    <?php endif; ?>
                    <?php foreach ($section['items'] as $item): ?>
                        <a href="<?php echo htmlspecialchars($item['url']); ?>">
                            <?php echo htmlspecialchars($item['title']); ?>
                        </a>
                    <?php endforeach; ?>
                    <?php if($section['section'] == "Services"):?>
                            
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

</div>

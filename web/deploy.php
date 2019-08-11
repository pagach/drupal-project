<?php
/**
 * GIT DEPLOYMENT SCRIPT
 *
 * Used for automatically deploying websites via github or bitbucket, more deets here:
 * https://gist.github.com/riodw/71f6e2244534deae652962b32b7454e2
 * How To Use:
 * https://medium.com/riow/deploy-to-production-server-with-git-using-php-ab69b13f78ad
 */
if (isset($_GET['secret']) && $_GET['secret'] === 'sUyrgNMZKSDZ9BzQIXR2nAMeBmWrj96FzIK2FWmh7agOlS0UeKN0Xb0s4Xn4') {
  if (!isset($_GET['work_tree'])) {
    $output = "Please provide work_tree path!";
  } elseif (!isset($_GET['git_dir'])) {
    $output = "Please provide git_dir path (without /.git part)!";
  } else {
    // The commands
    // git --work-tree=/home/apagacdev/domains/e-inkubator.apagacdev.tk/public_html --git-dir=/home/apagacdev/domains/e-inkubator.apagacdev.tk/repo/.git pull
    // http://e-inkubator.apagacdev.tk/deploy.php?secret=sUyrgNMZKSDZ9BzQIXR2nAMeBmWrj96FzIK2FWmh7agOlS0UeKN0Xb0s4Xn4&work_tree=/home/apagacdev/domains/e-inkubator.apagacdev.tk/public_html&git_dir=/home/apagacdev/domains/e-inkubator.apagacdev.tk/repo
    $commands = array(
      'echo $PWD',
      'whoami',
      "git --work-tree={$_GET['work_tree']} --git-dir={$_GET['git_dir']}/.git reset --hard HEAD",
      "git --work-tree={$_GET['work_tree']} --git-dir={$_GET['git_dir']}/.git pull",
      "git --work-tree={$_GET['work_tree']} --git-dir={$_GET['git_dir']}/.git status",
      "git --work-tree={$_GET['work_tree']} --git-dir={$_GET['git_dir']}/.git submodule sync",
      "git --work-tree={$_GET['work_tree']} --git-dir={$_GET['git_dir']}/.git submodule update",
      "git --work-tree={$_GET['work_tree']} --git-dir={$_GET['git_dir']}/.git submodule status",
    );
// Run the commands for output
    $output = '';
    foreach ($commands AS $command) {
      // Run it
      $tmp = shell_exec($command);
      // Output
      $output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
      $output .= htmlentities(trim($tmp)) . "\n";
    }
// Make it pretty for manual user access (and why not?)
  }
} else {
  $output = "Please provide secret via url!";
}

?>
<!DOCTYPE HTML>
<html lang="en-UK">
<head>
  <meta charset="UTF-8">
  <title>GIT DEPLOYMENT SCRIPT</title>
</head>
<body style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;">
<pre>
 ____________________________
|                            |
| Git Deployment Script v0.1 |
|      github.com/riodw 2017 |
|____________________________|

<?php echo $output; ?>
</pre>
</body>
</html>

<html>

<head>
<title>Hello World!</title>
</head>

<body>

<?php echo "Hello World!"; ?>
<?php if($_ENV["HOSTNAME"]) {?><h3>My hostname is <?php echo $_ENV["HOSTNAME"]; ?><br /><br />
<!-- comment <?php phpinfo(); ?><br /><br /> -->
<?php echo $_SERVER['HTTP_HOST']; ?><br /><br />
  
<?php
$host = $_SERVER['HTTP_HOST'];
$host = str_ireplace('openshift-php-hello-world-git-demo.apps.', '', $host);
$host = str_ireplace('.hkopenshift.com', '', $host);
echo $host;
$colour = $host;
?>
<body bgcolor="<?php echo $colour; ?>">
  
<?php $links = [];
  foreach($_ENV as $key => $value) {
    if(preg_match("/^(.*)_PORT_([0-9]*)_(TCP|UDP)$/", $key, $matches)) {
      $links[] = [
        "name"  => $matches[1],
        "port"  => $matches[2],
        "proto" => $matches[3],
        "value" => $value
      ];
    }
  }

  if($links) {
    foreach($links as $link) {
      echo $link["name"]; ?>  listening on port <?php echo $link["port"]."/".$link["proto"]; ?> available at <?php echo $link["value"]; ?><br /><?php
    }
  }

}
?>

</body>
</html>

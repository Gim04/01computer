<html>

<head>
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monoton&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Voltaire&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monofett&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href="{{ asset('js/simplelightbox/dist/simple-lightbox.min.css')}} type='text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" type="text/css" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body>

    <div class='container'>
        <div class="gallery">

            <?php
            // Image extensions
            $image_extensions = array("png", "jpg", "jpeg", "gif");

            // Target directory
            $dir = 'photo/';

            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    $count = 1;

                    // Read files
                    while (($file = readdir($dh)) !== false) {
                       

                        if ($file != '' && $file != '.' && $file != '..') {

                            // Thumbnail image path
                            $thumbnail_path = "photo/" . $file;

                            // Image path
                            $image_path = "photo/" . $file;

                            $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
                            $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

                            // Check its not folder and it is image file
                            if (
                                !is_dir($image_path) &&
                                in_array($thumbnail_ext, $image_extensions) &&
                                in_array($image_ext, $image_extensions)
                            ) {
            ?>

                                <!-- Image -->
                                <a href="<?php echo $image_path; ?>">
                                    <img src="<?php echo $thumbnail_path; ?>" alt="" title="" />
                                </a>
                                <!-- --- -->
                                <?php

                                // Break
                                if ($count % 5 == 0) {
                                ?>
                                    <div class="clear"></div>
            <?php
                                }
                                $count++;
                            }
                        }
                    }
                    closedir($dh);
                }
            }
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/simplelightbox/dist/simple-lightbox.min.css')}}"></script>
    <!-- Script -->
    <script type='text/javascript'>
        $(document).ready(function() {

            // Intialize gallery
            var gallery = $('.gallery a').simpleLightbox();

        });
    </script>
</body>

</html>
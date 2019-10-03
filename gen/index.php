<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container">

        <?php
        if (isset($_POST) && !empty($_POST)) {

            $protocol = $_POST['protocol'];
            $target = $_POST['target'];

            $domain = 'https://tracker.lucasmoreira.com.br/?info=';
            ?>

            <div class="row mt-3">
                <div class="col-12 col-md-10 offset-md-1">

                    <div class="alert alert-success">
                        <strong><?php echo $protocol ?> &rarr;</strong> <?php echo $domain . base64_encode($protocol . $target); ?>
                    </div>

                </div>
            </div>

            <?php
        }
        ?>

        <div class="row">
            <div class="col-12 col-md-4 offset-md-4">

                <h1>Tracked link Gen</h1>

                <form method="post" action="<?php $SELF; ?>">
                            
                    <div class="form-group">
                        <label>Protocol</label>
                        <select class="form-control" name="protocol">
                            <option value="tel:">Telefone (Fixo ou sem WhatsApp)</option>
                            <option value="mailto:">E-mail</option>
                            <option value="http://">Site (Sem SSL)</option>
                            <option value="https://">Site (Com SSL)</option>
                            <option value="whatsapp:">WhatsApp</option>
                        </select>
                    </div>

                    <div class="form-group mt-2 mb-4">
                        <label>Target</label>
                        <input type="text" class="form-control" autocomplete="off" name="target" placeholder="ex: www.lucasmoreira.com.br || 31983645656">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Generate</button>

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.container -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
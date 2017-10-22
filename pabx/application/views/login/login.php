
<form class="form-signin" action="<?php echo base_url(); ?>login/verificar" method="post">
    <h2 class="form-signin-heading"><i class="fa fa-asterisk" aria-hidden="true"></i> Landell</h2>
    <label for="inputText"  class="sr-only">Login</label>
    <input type="text" name="login" id="inputText" class="form-control" placeholder="Login" required autofocus>
    <br />
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>

    <button class="btn btn-lg btn-outline-primary btn-block" type="submit">Entrar <i class="fa fa-sign-in" aria-hidden="true"></i></button>
</form>

</div>

</body>
</html>
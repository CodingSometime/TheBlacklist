<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/signin.css" />
    
    <main class="form-signin">
    <?php echo form_open(base_url() . "page/redirect", array("id" => "formData", "class" => "row g-3 needs-validation")); ?>
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
          <label for="floatingInput">Email address</label>
          <div class="invalid-feedback">Hello World</div>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
          <div class="invalid-feedback">Hello World</div>
        </div>
    
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; The Blacklist System 2021-2022</p>
      </form>
    </main>
    
<template>
  <div>
    <form action="" method="post">
      <div class="justify-content-center">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input
            type="name"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="Your name"
          />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input
            type="email"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="name@example.com"
          />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Confirm Email address</label
          >
          <input
            type="email"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="name@example.com"
          />
        </div>
        <div class="mb-3">
          <label for="inputPassword5" class="form-label">Password</label>
          <input
            type="password"
            id="inputPassword5"
            class="form-control"
            aria-describedby="passwordHelpBlock"
          />
          <div id="passwordHelpBlock" class="form-text">
            Your password must be 8-20 characters long, contain letters and numbers, and
            must not contain spaces, special characters, or emoji.
          </div>
        </div>
        <div class="mb-3">
          <label for="inputPassword5" class="form-label">Password</label>
          <input
            type="password"
            id="inputPassword5"
            class="form-control"
            aria-describedby="passwordHelpBlock"
          />
        </div>
        <div class="mb-3">
          <p>
            Cao ja seja cadastrado:
            <router-link :to="{ name: 'login' }"> Entrar </router-link>
          </p>
        </div>
        <input class="btn btn-primary" type="submit" value="Submit" />
      </div>
    </form>
  </div>
</template>

<template lang="html">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">Главная</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="/drivers">Водители</a></li>
        <li class="nav-item">
          <router-link class="nav-link" to="/transports">Транспорт</router-link>
        </li>
      </ul>

      <ul class="navbar-nav navbar-right">
          <ul class="nav navbar-nav navbar-right">
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                     data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false" v-pre>
                      Администратор
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="/logout">
                          Выйти
                      </a>
                  </div>
              </li>
          </ul>
      </ul>
    </div>
  </div>
</nav>
</template>

<script>
export default {
  name: 'Navbar'
}
</script>

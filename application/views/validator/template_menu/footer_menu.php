  <!-- Main Footer -->
  <footer class="main-footer bg-light">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0</b>
    </div>
    <strong>Copyright &copy; 2023 <a href="https://jmto.co.id">E-Procurement JMTO</a>.</strong> All rights reserved.
  </footer>
  </div>
  <script>
    window.onload = function() {
      jam();
    }

    function jam() {
      var e = document.getElementById('jam'),
        d = new Date(),
        h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());

      e.innerHTML = h + ':' + m + ':' + s;

      setTimeout('jam()', 1000);
    }

    function set(e) {
      e = e < 10 ? '0' + e : e;
      return e;
    }
  </script>
  <!-- ./wrapper -->
<?php
// Conectar ao banco de dados com PDO
include("conexao.php");

try {
    // Consulta para pegar a última mensagem
    $sql = "SELECT nome, mensagem, TIMESTAMPDIFF(MINUTE, data_envio, NOW()) AS minutos_atras 
            FROM tb_mensagens 
            ORDER BY data_envio DESC 
            LIMIT 1";

    // Preparar a consulta
    $stmt = $conn->prepare($sql);

    // Executar a consulta
    $stmt->execute();

    // Verificar se há resultados
    if ($stmt->rowCount() > 0) {
        // Se houver resultado, busca a última mensagem
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome = $row['nome'];
        $mensagem = $row['mensagem'];
        $minutos_atras = $row['minutos_atras'];
    } else {
        // Caso não haja mensagens
        $nome = "N/A";
        $mensagem = "Nenhuma mensagem recebida.";
        $minutos_atras = 0;
    }

} catch (PDOException $e) {
    // Caso haja erro na execução da consulta
    echo "Erro: " . $e->getMessage();
}
?>
<?php
// Exemplo de valor para minutos_atras, que vem da consulta SQL
$minutos_atras = 120; // Exemplo, substitua pelo valor real da consulta

// Lógica para calcular o tempo
if ($minutos_atras < 60) {
    // Menos de uma hora
    $tempo = $minutos_atras . " minutos atrás";
} elseif ($minutos_atras >= 60 && $minutos_atras < 1440) {
    // Menos de um dia (1440 minutos)
    $horas = floor($minutos_atras / 60);
    $tempo = $horas . " horas atrás";
} else {
    // Mais de um dia
    $dias = floor($minutos_atras / 1440);
    $tempo = $dias . " dias atrás";
}
?>
<nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="pesquisar ..."
                    class="form-control"
                  />
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="messageDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-envelope"></i>
                  </a>
                  <ul
                    class="dropdown-menu messages-notif-box animated fadeIn"
                    aria-labelledby="messageDropdown"
                  >
                    <li>
                      <div
                        class="dropdown-title d-flex justify-content-between align-items-center"
                      >
                        Mensagens
                        <a href="#" class="small">Marcar todas como lidas</a>
                      </div>
                    </li>
                    <li>
                      <div class="message-notif-scroll scrollbar-outer">
                        <div class="notif-center">
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/jm_denis.jpg"
                                alt="Img Profile"
                              />
                            </div>
                            <div class="notif-content">
                              <span class="subject"><?php echo htmlspecialchars($nome); ?></span>
                              <span class="block"><?php echo htmlspecialchars($mensagem); ?></span>
                              <span class="time"><?php echo $tempo; ?></span>
                            </div>
                          </a>
                          
                        </div>
                      </div>
                    </li>
                    <li>
                      <a class="see-all" href="mensagens.php"
                        >Ver todas as mensagens<i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="notifDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-bell"></i>
                    <span class="notification">1</span>
                  </a>
                  <ul
                    class="dropdown-menu notif-box animated fadeIn"
                    aria-labelledby="notifDropdown"
                  >
                    <li>
                      <div class="dropdown-title">
                        Você tem 1 notificação
                      </div>
                    </li>
                    <li>
                      <div class="notif-scroll scrollbar-outer">
                        <div class="notif-center">
                          <a href="#">
                            <div class="notif-icon notif-primary">
                              <i class="fa fa-user-plus"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block"> Novo Usuario Registrado </span>
                              <span class="time">5 minutos atrás</span>
                            </div>
                          </a>
                         
                        </div>
                      </div>
                    </li>
                    <li>
                      <a class="see-all" href="javascript:void(0);"
                        >Ver todas notificações<i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                    <span
                            class="avatar-title rounded-circle border border-white"
                            >ML</span
                          >
                    </div>
                    <span class="profile-username">
                     
                      <span class="fw-bold">Usuario</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                          <span
                            class="avatar-title rounded-circle border border-white"
                            >CF</span
                          >
                          </div>
                          <div class="u-text">
                            <h4>Usuario</h4>
                            <p class="text-muted">email@exemplo.com</p>
                            <a
                              href="perfil.php"
                              class="btn btn-xs btn-secondary btn-sm"
                              >Ver Perfil</a
                            >
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="perfil.php">Perfil</a>
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Definições da conta</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
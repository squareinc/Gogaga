
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/userdefault.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php if(isset($_SESSION['username'])){
                  $username = $_SESSION['username'];
                echo $username;
              } ?>
          </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

   

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->

        <li id="sidebar-dashboard">
          <a href="dashboard.php"><i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>

        <li class="treeview" id="sidebar-forms">
          <a href="#"><i class="fa fa-file-text-o"></i> <span>Forms</span>
             <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="requestform.php">Raise a Request</a></li>
            <li><a href="uploadquotation.php">Upload a competitive quote</a></li>
          </ul>
        </li>

        <li class="treeview" id="sidebar-itineraries">
          <a href="#"><i class="fa fa-tasks"></i> <span>Itineraries</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="requesteditineraries.php">Requested Itineraries</a></li>
            <li><a href="receiveditineraries.php">Received Itineraries</a></li>
            <li><a href="confirmeditineraries.php">Confirmed Itineraries</a></li>
            <li><a href="recentpackages.php">Recent Packages</a></li>
          </ul>
        </li>

        <li class="treeview" id="sidebar-tools">
          <a href="#"><i class="fa fa-wrench"></i> <span>Tools</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="currencyconverter.php">Currency Converter</a></li>
            <li><a href="https://www.google.com/maps" target="_blank">Maps</a></li>
          </ul>
        </li>

        <li class="treeview" id="sidebar-statements">
          <a href="#"><i class="fa fa-file"></i> <span>Statements</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="partnerstatements.php">Issued Statements</a></li>
            
          </ul>
        </li>

        <li id="sidebar-clients">
          <a href="clients.php"><i class="fa fa-users"></i> <span>Clients</span></a>
        </li>
        <li id="sidebar-vouchers">
          <a href="vouchers.php"><i class="fa fa-ticket"></i> <span>Vouchers</span></a>
        </li>
        <li id="sidebar-gallery">
          <a href="gallery.php"><i class="fa fa-picture-o"></i> <span>Marketing Flyers</span></a>
        </li>
        <li id="sidebar-contacts">
          <a href="contacts.php"><i class="fa fa-link"></i> <span>Contacts</span></a>
        </li>
        <li id="sidebar-inter-sim-cards">
          <a href="inter-sim-cards.php"><i class="fa fa-link"></i> <span>International Sim Cards</span></a>
        </li>
        <li id="sidebar-travel-insurance">
          <a href="travel-insurance.php"><i class="fa fa-link"></i> <span>Travel Insurance</span></a>
        </li>

         <li class="treeview" id="sidebar-travel-visa">
          <a href="#"><i class="fa fa-link"></i> <span>Travel Visa</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="travel-visa.php">Travel Visa</a></li>
            <li><a href="visa-checklist.php">Visa Checklist</a></li>
            
          </ul>
        </li>

        
        <li id="sidebar-travel-definitions">
          <a href="travel-definitions.php"><i class="fa fa-link"></i> <span>Travel Definitions</span></a>
        </li>

         <li id="sidebar-terms-conditions">
          <a href="terms-conditions.php"><i class="fa fa-link"></i> <span>Terms &amp; Conditions</span></a>
        </li>

        <li id="sidebar-faq">
          <a href="faq.php"><i class="fa fa-link"></i> <span>FAQ</span></a>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
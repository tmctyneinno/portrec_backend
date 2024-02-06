
<html>
  <head>

    <style>
        @font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
  src: local('Open Sans Regular'), local('OpenSans-Regular'), url("https://fonts.gstatic.com/s/opensans/v16/mem8YaGs126MiZpBA-UFVZ0b.woff2") format('woff2');
}
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
  src: local('Roboto'), local('Roboto-Regular'), url("https://fonts.gstatic.com/s/roboto/v19/KFOmCnqEu92Fr1Mu4mxK.woff2") format('woff2');
}
@page {
  size: A4;
}
body {
  -webkit-print-color-adjust: exact;
          color-adjust: exact;
  background-color: #fff;
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  display: flex;
  justify-content: center;
}
.btn-print {
  z-index: 1;
  position: absolute;
  right: 20px;
  top: 20px;
}
.resume {
  display: block;
  font-family: 'Roboto', sans-serif;
  font-size: 13.0736px;
  font-weight: 400;
  line-height: 1.5;
  min-height: 1090.41px;
}
.resume h1 {
  font-size: 2.86em;
  font-weight: 600;
  letter-spacing: -0.5px;
}
.resume h2 {
  font-size: 1.43em;
  font-weight: 600;
  line-height: 1;
  margin-bottom: 0;
}
.resume p {
  margin-bottom: 1em;
}
.resume p:last-child {
  margin-bottom: 0;
}
.resume ul {
  padding-left: 20px;
}
.resume .resume__header,
.resume .resume__section {
  font-family: 'Open Sans', sans-serif;
  font-size: 0.95em;
}
.resume .resume__header {
  padding: 6em 4em 0;
}
.resume .resume__section {
  margin-bottom: 4em;
}
.resume .resume__section:last-child {
  padding-bottom: 0;
}
.resume .resume__section-title {
  display: flex;
  align-items: center;
  margin-bottom: 1.43em;
}
.resume .resume__section-title > i {
  margin-right: 0.63em;
  font-size: 1.14em;
  background-color: #5695cd;
  color: #fff;
  border: 0.25em solid #aacae6;
  border-radius: 50%;
  width: 2.51em;
  height: 2.51em;
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 1.6;
}
.resume .resume__section-title > h2 {
  margin-top: 0;
  font-size: 1.5em;
}
.resume .resume__columns {
  overflow: hidden;
  padding: 4em;
  padding-top: 0;
}
.resume .resume__main {
  float: left;
  width: 65%;
  padding-right: 6em;
}
.resume .resume__side {
  float: left;
  width: 25%;
}
.resume .other-info p > b {
  color: #555;
}
.resume .info-item {
  margin-bottom: 0.2em;
  font-weight: 300;
}
.resume .info-item:last-child {
  margin-bottom: 0;
}
.resume .info-label {
  display: inline-block;
  padding-right: 0.63em;
  font-size: 1.14em;
  min-width: 2.19em;
  text-align: center;
}
.resume .info-label i {
  color: #5695cd;
}
.resume .xp-item {
  margin-bottom: 4em;
}
.resume .xp-item:last-child {
  margin-bottom: 0;
}
.resume .xp-job {
  font-size: 1.14em;
  font-weight: 600;
  line-height: 1.25;
}
.resume .xp-job span,
.resume .xp-job small {
  font-weight: 400;
}
.resume .xp-job small {
  font-size: 0.9em;
}
.resume .xp-date {
  font-size: 0.8em;
  margin-top: 0.3em;
  margin-bottom: 1em;
  color: #5695cd;
}
.resume .extra {
  margin-bottom: 2em;
}
.resume .extra:last-child {
  margin-bottom: 0;
}
.resume .extra-info small {
  color: #666;
  display: inline-block;
  font-size: 0.7em;
}
.resume .extra-details,
.resume .extra-details__progress {
  border-radius: 6px;
}
.resume .extra-details {
  margin-top: 0.5em;
  background-color: #d1d9e1;
  width: 100%;
  height: 5px;
  position: relative;
}
.resume .extra-details__progress {
  background-color: #5695cd;
  height: 5px;
  position: absolute;
  top: 0;
  left: 0;
}
.resume .lang-item {
  margin-bottom: 2em;
}
.resume .lang-item:last-child {
  margin-bottom: 0;
}
.resume .lang-label {
  width: 8em;
}
@media print {
  body {
    min-width: initial !important;
  }
  .btn-print {
    display: none;
  }
}

    </style>
  </head>
  <body class="A4">
    <div class="sheet">
      <button class="btn btn-print btn-sm btn-light" onClick="handlePrint()">
        <i class="fa fa-print"></i>
        Print
      </button>
      <div class="two-column resume">
        <section class="resume__section resume__header">
          <div class="resume__content">
            <h1>Thiago Braga</h1>
            <div class="info-item"><span class="info-label"><i class="fa fa-location-arrow"></i></span><span class="info-text">
                770 Marçal de Arruda Campos St., Bauru, SP, Brazil,
                Zip: 17063-060</span></div>
            <div class="info-item"><span class="info-label"><i class="fa fa-envelope"></i></span><span class="info-text">contato@thiagobraga.org</span></div>
            <div class="info-item"><span class="info-label"><i class="fa fa-phone"></i></span><span class="info-text">+55 14 99165 5873</span></div>
          </div>
        </section>
        <div class="resume__columns">
          <div class="resume__main">
            <section class="resume__section resume__summary">
              <div class="resume__content">
                <div class="resume__section-title"><i class="fa fa-pencil-square-o"></i>
                  <h2>Professional Summary</h2>
                </div>
                <div class="other">
                  <div class="other-info">
                    <p>
                      PHP & JavaScript developer + Devops Enthusiast with a
                      decade of success leading teams in delivering appropriate
                      technology solutions for desktop and mobile products.
                    </p>
                    <p>
                      Comprehensive knowledge of enterprise architecture,
                      agile methodologies, remote work, cloud services and
                      web-based applications.
                    </p>
                  </div>
                </div>
              </div>
            </section>
            <section class="resume__section resume__experience">
              <div class="resume__content">
                <div class="resume__section-title"><i class="fa fa-briefcase"></i>
                  <h2>Employment History</h2>
                </div>
                <div class="xp-item">
                  <div class="xp-job">
                    Full Stack Developer / DevOps
                    <span>@ Grupo Tesseract</span><br/><small>Bauru, Sao Paulo</small>
                  </div>
                  <div class="xp-date">Apr. 2017 – current</div>
                  <div class="xp-detail">
                    <ul>
                      <li>
                        Design, build or maintain web sites using Laravel,
                        Bootstrap, Vue, React and WordPress
                      </li>
                      <li>Create scripting language tools</li>
                      <li>Automate dev, builds and deploy tasks</li>
                      <li>
                        Maintain understanding of current web technologies or
                        programming practices through continuing education,
                        reading and sharing knowledge
                      </li>
                      <li>
                        Develop databases that support web applications and
                        web sites
                      </li>
                      <li>
                        Develop and document style guidelines for web site
                        content
                      </li>
                      <li>Recommend and implement performance improvements</li>
                      <li>
                        Select programming languages, design tools,
                        or applications
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="xp-item">
                  <div class="xp-job">
                    Full Stack Developer
                    <span>@ Jurid Publicações Eletrônicas</span><br/><small>Bauru, Sao Paulo</small>
                  </div>
                  <div class="xp-date">Aug. 2018 – Apr. 2020</div>
                  <div class="xp-detail">
                    <ul>
                      <li>
                        Build or maintain web sites using native PHP, Python
                        and JavaScript
                      </li>
                      <li>
                        Maintain and improve production databases running on
                        Elasticsearch, Redis, PostgreSQL and MySQL
                      </li>
                      <li>Provide backup and maintenance of GNU/Linux servers</li>
                      <li>Provide documentation for existent and new applications</li>
                    </ul>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="resume__side">
            <section class="resume__section resume__skills">
              <div class="resume__content">
                <div class="resume__section-title"><i class="fa fa-align-center"></i>
                  <h2>Skills</h2>
                </div>
                <div class="resume__text">
                  <div class="extra">
                    <div class="extra-info">PHP<br/><small>PHP 5 · PHP 7 · Laravel</small></div>
                    <div class="extra-details">
                      <div class="extra-details__progress" style="width:90%"></div>
                    </div>
                  </div>
                  <div class="extra">
                    <div class="extra-info">JavaScript<br/><small>React · React Native · Vue</small></div>
                    <div class="extra-details">
                      <div class="extra-details__progress" style="width:87%"></div>
                    </div>
                  </div>
                  <div class="extra">
                    <div class="extra-info">HTML<br/><small>HTML5 · Markdown · Pug</small></div>
                    <div class="extra-details">
                      <div class="extra-details__progress" style="width:100%"></div>
                    </div>
                  </div>
                  <div class="extra">
                    <div class="extra-info">CSS<br/><small>Stylus · Sass · Bootstrap</small></div>
                    <div class="extra-details">
                      <div class="extra-details__progress" style="width:100%"></div>
                    </div>
                  </div>
                  <div class="extra">
                    <div class="extra-info">DevOps<br/><small>Docker · Shell · AWS · CI/CD</small></div>
                    <div class="extra-details">
                      <div class="extra-details__progress" style="width:82%"></div>
                    </div>
                  </div>
                  <div class="extra">
                    <div class="extra-info">Databases<br/><small>PostgreSQL · MySQL · Elasticsearch · Redis</small></div>
                    <div class="extra-details">
                      <div class="extra-details__progress" style="width:80%"></div>
                    </div>
                  </div>
                  <div class="extra">
                    <div class="extra-info">Operating Systems<br/><small>
                        <i class="fa fa-linux"></i> GNU/Linux ·
                        <i class="fa fa-apple"></i> Mac OS ·
                        <i class="fa fa-windows"></i> Windows</small></div>
                    <div class="extra-details">
                      <div class="extra-details__progress" style="width:90%"></div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="resume__section resume__languages">
              <div class="resume__content">
                <div class="resume__section-title"><i class="fa fa-globe"></i>
                  <h2>Languages</h2>
                </div>
                <div class="extra">
                  <div class="extra-info">Portuguese <small>(native)</small></div>
                  <div class="extra-details">
                    <div class="extra-details__progress" style="width:100%"></div>
                  </div>
                </div>
                <div class="extra">
                  <div class="extra-info">English</div>
                  <div class="extra-details">
                    <div class="extra-details__progress" style="width:65%"></div>
                  </div>
                </div>
                <div class="extra">
                  <div class="extra-info">Spanish</div>
                  <div class="extra-details">
                    <div class="extra-details__progress" style="width:20%"></div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
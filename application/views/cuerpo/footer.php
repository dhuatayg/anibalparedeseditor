        <footer class="footer">
            <div class="container">
                <br>
                <p class="text-muted text-center">Desarrollado por Angel Pool Contreras Paima | <b>Anibal Paredes Editor S.A.C v.1.0</b></p>
            </div>
        </footer>
        <script>
            var baseurl = "<?php echo base_url(); ?>";
        </script>
        <!-- <script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/table/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/table/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/table/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/table/responsive.bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/select2/select2.full.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
        <script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/Moment/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.css">
        <script src="<?php echo base_url(); ?>plugins/Moment/moment-with-locales.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/numeric/jquery.numeric.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/loading/jquery.loading.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datetimepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
        <script src="<?php echo base_url(); ?>dist/js/ajaxfileupload.js"></script>
        <script src="<?php echo base_url(); ?>dist/menu/js/cbpHorizontalMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap3-typeahead.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/Buttons-1.4.2/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/Jszip-3.1.4/dist/jszip.min.js"></script> -->

        <script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/table/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/table/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/table/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/table/responsive.bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.css">
        <script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
        <script src="<?php echo base_url(); ?>dist/js/ajaxfileupload.js"></script>
        <script src="<?php echo base_url(); ?>dist/menu/js/cbpHorizontalMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap3-typeahead.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/Buttons-1.4.2/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/Jszip-3.1.4/dist/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/highcharts/highcharts.js"></script>
        <script src="<?php echo base_url(); ?>plugins/highcharts/exporting.js"></script>
        <script src="<?php echo base_url(); ?>plugins/highcharts/export-data.js"></script>
        <script src="<?php echo base_url(); ?>js/general.js"></script>
        <script src="<?php echo base_url(); ?>js/rol.js"></script>
        <script src="<?php echo base_url(); ?>js/usuario.js"></script>
        <script src="<?php echo base_url(); ?>js/estado.js"></script>
        <script src="<?php echo base_url(); ?>js/maquina.js"></script>
        <script src="<?php echo base_url(); ?>js/area.js"></script>
        <script src="<?php echo base_url(); ?>js/categoria.js"></script>
        <script src="<?php echo base_url(); ?>js/fase.js"></script>
        <script src="<?php echo base_url(); ?>js/material.js"></script>
        <script src="<?php echo base_url(); ?>js/cliente.js"></script>
        <script src="<?php echo base_url(); ?>js/producto.js"></script>
        <script src="<?php echo base_url(); ?>js/produccion.js"></script>
        <script>
            (function() {
                // VARIABLES
                const timeline = document.querySelector(".timeline ol"),
                    elH = document.querySelectorAll(".timeline li > div"),
                    arrows = document.querySelectorAll(".timeline .arrows .arrow"),
                    arrowPrev = document.querySelector(".timeline .arrows .arrow__prev"),
                    arrowNext = document.querySelector(".timeline .arrows .arrow__next"),
                    firstItem = document.querySelector(".timeline li:first-child"),
                    lastItem = document.querySelector(".timeline li:last-child"),
                    xScrolling = 450,
                    disabledClass = "disabled";

                // START
                window.addEventListener("load", init);

                function init() {
                    setEqualHeights(elH);
                    animateTl(xScrolling, arrows, timeline);
                    setSwipeFn(timeline, arrowPrev, arrowNext);
                    setKeyboardFn(arrowPrev, arrowNext);
                }

                // SET EQUAL HEIGHTS
                function setEqualHeights(el) {
                    let counter = 0;
                    for (let i = 0; i < el.length; i++) {
                        const singleHeight = el[i].offsetHeight;

                        if (counter < singleHeight) {
                            counter = singleHeight;
                        }
                    }

                    for (let i = 0; i < el.length; i++) {
                        el[i].style.height = `${counter}px`;
                    }
                }

                // CHECK IF AN ELEMENT IS IN VIEWPORT
                // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
                function isElementInViewport(el) {
                    const rect = el.getBoundingClientRect();
                    return (
                        rect.top >= 0 &&
                        rect.left >= 0 &&
                        rect.bottom <=
                        (window.innerHeight || document.documentElement.clientHeight) &&
                        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                    );
                }

                // SET STATE OF PREV/NEXT ARROWS
                function setBtnState(el, flag = true) {
                    if (flag) {
                        el.classList.add(disabledClass);
                    } else {
                        if (el.classList.contains(disabledClass)) {
                            el.classList.remove(disabledClass);
                        }
                        el.disabled = false;
                    }
                }

                // ANIMATE TIMELINE
                function animateTl(scrolling, el, tl) {
                    let counter = 0;
                    for (let i = 0; i < el.length; i++) {
                        el[i].addEventListener("click", function() {
                            if (!arrowPrev.disabled) {
                                arrowPrev.disabled = true;
                            }
                            if (!arrowNext.disabled) {
                                arrowNext.disabled = true;
                            }
                            const sign = this.classList.contains("arrow__prev") ? "" : "-";
                            if (counter === 0) {
                                tl.style.transform = `translateX(-${scrolling}px)`;
                            } else {
                                const tlStyle = getComputedStyle(tl);
                                // add more browser prefixes if needed here
                                const tlTransform =
                                    tlStyle.getPropertyValue("-webkit-transform") ||
                                    tlStyle.getPropertyValue("transform");
                                const values =
                                    parseInt(tlTransform.split(",")[4]) +
                                    parseInt(`${sign}${scrolling}`);
                                tl.style.transform = `translateX(${values}px)`;
                            }

                            setTimeout(() => {
                                isElementInViewport(firstItem) ?
                                    setBtnState(arrowPrev) :
                                    setBtnState(arrowPrev, false);
                                isElementInViewport(lastItem) ?
                                    setBtnState(arrowNext) :
                                    setBtnState(arrowNext, false);
                            }, 1100);

                            counter++;
                        });
                    }
                }

                // ADD SWIPE SUPPORT FOR TOUCH DEVICES
                function setSwipeFn(tl, prev, next) {
                    const hammer = new Hammer(tl);
                    hammer.on("swipeleft", () => next.click());
                    hammer.on("swiperight", () => prev.click());
                }

                // ADD BASIC KEYBOARD FUNCTIONALITY
                function setKeyboardFn(prev, next) {
                    document.addEventListener("keydown", (e) => {
                        if (e.which === 37 || e.which === 39) {
                            const timelineOfTop = timeline.offsetTop;
                            const y = window.pageYOffset;
                            if (timelineOfTop !== y) {
                                window.scrollTo(0, timelineOfTop);
                            }
                            if (e.which === 37) {
                                prev.click();
                            } else if (e.which === 39) {
                                next.click();
                            }
                        }
                    });
                }
            })();
        </script>

        </html>
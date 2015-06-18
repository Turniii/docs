import java.awt.Color;
import java.awt.List;
import java.lang.Math;
import java.lang.reflect.Array;
import java.util.ArrayList;

public class barageShell extends shell {

    public barageShell(double px, double py) {
        super(px, py);
    }

    public boolean shot(tank tank, font fond, double puiss, int vent, tank tank2) {
        py = 0;
        double py1 = 0, py2 = 0, py3 = 0, py4 = 0, py5 = 0;
        boolean tankTouched = false;
        tir = true;
        int t = 1;
        int a = 0;
        boolean chute = false;
        double departChute = 0;
        double[] val_y = fond.val_y;
        double[] val_x = fond.val_x;
        double posYpre = 0;
        int avance = 0;
        double posX = 0;
        double posY = tank.py;
        double departX = (tank.px + 18 * Math.cos(Math.toRadians(tank.canon_position)));
        double departY = (tank.py + 2 + 18 * Math.sin(Math.toRadians(tank.canon_position)));
        double cosinus = Math.cos(Math.toRadians(tank.canon_position));
        double tan = Math.tan(Math.toRadians(tank.canon_position));
        boolean tankExplose = false;
        double puiss2 = puiss;
        if (vent < 0) {
            if (tank.canon_position < 90) {
                puiss2 -= -vent / 5;
            } else {
                puiss2 += -vent / 5;
            }
        } else {
            if (tank.canon_position < 90) {
                puiss2 += vent / 5;
            } else {
                puiss2 -= vent / 5;
            }
        }
        puiss2 *= puiss2;

        while (tir == true) {

            StdDraw.show(1);
            if (!chute) {
                posYpre = py;
                py = (int) (((-ay * avance * avance) / (2 * puiss2 * cosinus * cosinus) + (tan * avance)));
            }
            if (chute || posYpre > py) {
                chute = true;
                if (py1 != -1000) {
                    py1 = posYpre - 1.5 * departChute;
                }
                if (py2 != -1000) {
                    py2 = posYpre - 1 * departChute;
                }
                if (py3 != -1000) {
                    py3 = posYpre - 0.5 * departChute;
                }
                if (py4 != -1000) {
                    py4 = posYpre - 2 * departChute;
                }
                if (py5 != -1000) {
                    py5 = posYpre - 2.5 * departChute;
                }
                departChute++;
            }
            if (!chute) {
                posX = avance + departX;
                posY = (py + departY);
                StdDraw.setPenColor(StdDraw.BLACK);
                StdDraw.filledCircle(posX, posY, 3);
                StdDraw.setPenColor(tank.color);
                StdDraw.filledCircle(posX, posY, 4);
                if(!tankTouched)
                    tankTouched = tankCollision(posX, posY, tank2);

                if (tankTouched) {
                    tir = false;
                    if (posX < 990 || posX > 10) {
                        py = super.explosion(posX, posY, 20, fond);
                    }
                    return tankTouched;
                }

                if (posX > 1100 || posX < -100) {
                    tir = false;
                }
                if (posX > 0 && posX < 1000) {
                    if (posY <= val_y[(int) posX]) {
                        tir = false;
                        if (posX < 990 || posX > 10) {
                            py = super.explosion(posX, posY, 20, fond);
                        }
                    }
                }
            } else {

                if (py1 != -1000) {
                    StdDraw.setPenColor(tank.color);
                    StdDraw.filledCircle(posX, posY, 4);
                    posX = avance + departX;
                    posY = (py1 + departY);
                    StdDraw.setPenColor(StdDraw.BLACK);
                    StdDraw.filledCircle(posX, posY, 3);
                    if(!tankTouched)
                        tankTouched = tankCollision(posX, posY, tank2);

                    if (posX > 1100 || posX < -100) {
                        py1 = -1000;
                    }
                    if (posX > 0 && posX < 1000) {
                        if (posY <= val_y[(int) posX]) {
                            if (posX < 990 || posX > 10) {
                                py1 = super.explosion(posX, posY, 20, fond);
                                py1 = -1000;
                            }
                        }
                    }

                    if (tankTouched && !tankExplose) {
                        tir = false;
                        if (posX < 990 || posX > 10) {
                            py1 = super.explosion(posX, posY, 20, fond);
                            py1 = -1000;
                            tankExplose = true;
                        }
                    }
                }
                if (py2 != -1000) {
                    StdDraw.setPenColor(tank.color);
                    StdDraw.filledCircle(posX, posY, 4);
                    posX = avance + departX;
                    posY = (py2 + departY);
                    StdDraw.setPenColor(StdDraw.BLACK);
                    StdDraw.filledCircle(posX, posY, 3);
                    if(!tankTouched)
                        tankTouched = tankCollision(posX, posY, tank2);

                    if (posX > 1100 || posX < -100) {
                        py2 = -1000;
                    }
                    if (posX > 0 && posX < 1000) {
                        if (posY <= val_y[(int) posX]) {
                            if (posX < 990 || posX > 10) {
                                py2 = super.explosion(posX, posY, 20, fond);
                                py2 = -1000;
                            }
                        }
                    }

                    if (tankTouched && !tankExplose) {
                        tir = false;
                        if (posX < 990 || posX > 10) {
                            py2 = super.explosion(posX, posY, 20, fond);
                            py2 = -1000;
                            tankExplose = true;
                        }
                    }
                }
                if (py3 != -1000) {
                    StdDraw.setPenColor(tank.color);
                    StdDraw.filledCircle(posX, posY, 4);
                    posX = avance + departX;
                    posY = (py3 + departY);
                    StdDraw.setPenColor(StdDraw.BLACK);
                    StdDraw.filledCircle(posX, posY, 3);
                    if(!tankTouched)
                        tankTouched = tankCollision(posX, posY, tank2);

                    if (posX > 1100 || posX < -100) {
                        py3 = -1000;
                    }
                    if (posX > 0 && posX < 1000) {
                        if (posY <= val_y[(int) posX]) {
                            if (posX < 990 || posX > 10) {
                                py3 = super.explosion(posX, posY, 20, fond);
                                py3 = -1000;
                            }
                        }
                    }
                    if (tankTouched && !tankExplose) {
                        tir = false;
                        if (posX < 990 || posX > 10) {
                            py3 = super.explosion(posX, posY, 20, fond);
                            py3 = -1000;
                            tankExplose = true;
                        }
                        return tankTouched;
                    }
                }
                if (py4 != -1000) {
                    StdDraw.setPenColor(tank.color);
                    StdDraw.filledCircle(posX, posY, 4);
                    posX = avance + departX;
                    posY = (py4 + departY);
                    StdDraw.setPenColor(StdDraw.BLACK);
                    StdDraw.filledCircle(posX, posY, 3);
                    if(!tankTouched)
                        tankTouched = tankCollision(posX, posY, tank2);

                    if (posX > 1100 || posX < -100) {
                        py4 = -1000;
                    }
                    if (posX > 0 && posX < 1000) {
                        if (posY <= val_y[(int) posX]) {
                            if (posX < 990 || posX > 10) {
                                py4 = super.explosion(posX, posY, 20, fond);
                                py4 = -1000;
                            }
                        }
                    }

                    if (tankTouched && !tankExplose) {
                        tir = false;
                        if (posX < 990 || posX > 10) {
                            py4 = super.explosion(posX, posY, 20, fond);
                            py4 = -1000;
                            tankExplose = true;
                        }
                    }
                }
                if (py5 != -1000) {
                    StdDraw.setPenColor(tank.color);
                    StdDraw.filledCircle(posX, posY, 4);
                    posX = avance + departX;
                    posY = (py5 + departY);
                    StdDraw.setPenColor(StdDraw.BLACK);
                    StdDraw.filledCircle(posX, posY, 3);
                    if(!tankTouched)
                        tankTouched = tankCollision(posX, posY, tank2);

                    if (posX > 1100 || posX < -100) {
                        py5 = -1000;
                    }
                    if (posX > 0 && posX < 1000) {
                        if (posY <= val_y[(int) posX]) {
                            if (posX < 990 || posX > 10) {
                                py5 = super.explosion(posX, posY, 20, fond);
                                py5 = -1000;
                            }
                        }
                    }
                    if (tankTouched && !tankExplose) {
                        tir = false;
                        if (posX < 990 || posX > 10) {
                            py5 = super.explosion(posX, posY, 20, fond);
                            py5 = -1000;
                            tankExplose = true;
                        }
                        return tankTouched;
                    }
                }

            }
            if (py1 == -1000 && py2 == -1000 && py3 == -1000
                    && py4 == -1000 && py5 == -1000) {
                tir = false;
            }
            if (tank.canon_position > 90) {
                avance -= 1;
            } else {
                avance += 1;
            }

        }
        return tankTouched;
    }

//    public void shotTriple(shell[] balles, int angle, font fond , double puiss, tank tank1, tank tank2){
//        int avance = 0;
//        for (shell b : balles){
//            //b.py=(int) (((-ay * avance * avance) / (2 * puiss * puiss * cosinus * cosinus) + (tan * avance)));
//                
//        }
//    }
//    public boolean shot(tank tank, font fond, double puiss, int vent, tank tank2) {
//        boolean tankTouched = false;
//        tir = true;
//        int liste[] = new int[3500];
//        liste[0] = 0;
//        liste[1] = 1;
//        int t = 1;
//        int a = 0;
//        boolean chute = false;
//        double departChute = 0;
//        double[] val_y = fond.val_y;
//        double[] val_x = fond.val_x;
//        double posYpre = 0;
//        int avance = 0;
//        double posX;
//        double posY = tank.py;
//        double departX = (tank.px + 18 * Math.cos(Math.toRadians(tank.canon_position)));
//        double departY = (tank.py + 2 + 18 * Math.sin(Math.toRadians(tank.canon_position)));
//        double cosinus = Math.cos(Math.toRadians(tank.canon_position));
//        double tan = Math.tan(Math.toRadians(tank.canon_position));
//        while (tir == true) {
//            posX = avance + departX;
//            posY = (py + departY);
//            StdDraw.setPenColor(StdDraw.BLACK);
//            StdDraw.filledCircle(posX, posY, 3);
//            StdDraw.show(1);
//            if (!chute) {
//                posYpre = py;
//            }
//            py = (int) (((-ay * avance * avance) / (2 * puiss * puiss * cosinus * cosinus) + (tan * avance)));
//            if (posYpre > py) {
//                chute = true;
//                tir = false;
//                barageShell bastos1 = new barageShell(posX, posYpre);
//                barageShell bastos2 = new barageShell(posX, posYpre);
//                barageShell bastos3 = new barageShell(posX, posYpre);
//                shell[] bastos = new shell[3];
//                bastos[0]=bastos1;
//                bastos[1]=bastos2;
//                bastos[2]=bastos3;
//            }  
//
//            if (tank.canon_position > 90) {
//                avance -= 1 * (1 - (vent / 100));
//            } else {
//                avance += 1 * (1 - (vent / 100));
//            }
//
//            StdDraw.setPenColor(tank.color);
//            StdDraw.filledCircle(posX, posY, 4);
//
//            tankTouched = tankCollision(posX, posY, tank2);
//            if (tankTouched) {
//                tir = false;
//                if (posX < 990 || posX > 10) {
//                    py = super.explosion(posX, posY, 20, fond);
//                }
//                return tankTouched;
//            }
//
//            if (posX > 1100 || posX < -100) {
//                tir = false;
//            }
//            if (posX > 0 && posX < 1000) {
//                if (posY <= val_y[(int) posX]) {
//                    tir = false;
//                    if (posX < 990 || posX > 10) {
//                        py = super.explosion(posX, posY, 20, fond);
//                    }
//                }
//            }
//
//        }
//        return tankTouched;
//    }
}

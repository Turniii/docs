import java.awt.Color;
import java.awt.Font;
import java.awt.event.KeyEvent;
import java.io.IOException;
import tankwarz.states;

public class tankwarz {

    static int choice = 0;

    public static void main(String[] args) throws IOException {

        Music music = new Music();
        int val = (int) (Math.random() * 6);
        if (val == 0) {
            music.playSound("Spartacus __ Heart Of Courage [2013].wav", 3.0f);
        } else if (val == 1) {
            music.playSound("Game of Thrones Main Theme Official Soundtrack Version.wav", 3.0f);
        } else if (val == 2) {
            music.playSound("Medal of Honor- European Assault - Dogs of War [OST].wav", 3.0f);
        } else if (val == 3) {
            music.playSound("Rome Total War Soundtrack - Soldiers Chant.wav", 3.0f);
        } else if (val == 4) {
            music.playSound("Spartacus War of the Damned - Soundtrack _ 03 Getaway.wav", 3.0f);
        } else {
            music.playSound("Spartacus War of the Damned - Soundtrack _ 11 Crassus Army.wav", 3.0f);
        }
        StdDraw.setCanvasSize(1000, 500);
        StdDraw.setXscale(0, 1000);
        StdDraw.setYscale(0, 500);
        states step2 = null;
        font fond = new font("2");
        tank tank1 = new tank(3, 10, 20, fond.val_y[20], 45, Color.RED, 100);
        tank tank2 = new tank(3, 10, 300, fond.val_y[300], 135, Color.GREEN, 100);

        verticalShell shell1 = new verticalShell(0, 0);
        classicShell cShell = new classicShell(0, 0);
        barageShell bshell = new barageShell(1000, 500);
        bombeH hShell = new bombeH(1000, 500);
        bombeaMat mShell = new bombeaMat(1000, 500);
        save enreg = new save();
        display disp = new display();

        states step = states.MENU;
        boolean shoot = false;
        boolean initshoot = false;
        double angle = 0;
        int player = 0;
        int puiss = 520;
        int vent = 0;
        int shellsTab[];
        int mapChoose = -1;
        do {
            vent = (int) (-60 + Math.random() * 120);
        } while (vent == 0);
        while (!(StdDraw.isKeyPressed(KeyEvent.VK_ESCAPE))) {

            StdDraw.setPenColor(Color.ORANGE);
            StdDraw.picture(500, 250, "font.jpg", 1100, 540);
            StdDraw.setFont(new Font("Arial", Font.BOLD, 20));

            StdDraw.text(500, 480, "TANKWARZ");

            if (step == states.MENU) {
                step = playMenu();
            } else if (step == states.CHOOSEMAP) {
                mapChoose = playFont(fond);
                if (mapChoose == 0) {
                    fond = new font("2");
                }
                if (mapChoose == 1) {
                    fond = new font();
                }
                if (mapChoose == 2) {
                    fond = new font("1");
                }
                if (mapChoose != -1) {
                    mapChoose = -1;
                    step = states.INITJEU;
                }
            } else if (step == states.INITJEU) {
                tank1 = new tank(3, 10, 50, fond.val_y[20], 45, Color.RED, 100);
                tank2 = new tank(3, 10, 850, fond.val_y[300], 135, Color.BLUE, 100);
                player = (int) (Math.random() * 2);
                step = states.JEU;
            } else if (step == states.INITJEUCHARGE) {
                enreg.loadSave(tank1, tank2, fond);
                step = states.JEU;
            } else if (step == states.JEU) {
                if (player == 0) {
                    StdDraw.setPenColor(Color.RED);
                    StdDraw.text(500, 380, "Joueur 1 JOUEZ!");
                } else {
                    StdDraw.setPenColor(Color.BLUE);
                    StdDraw.text(500, 380, "Joueur 2 JOUEZ!");
                }
                fond.print_font();
                tank1.printTank();
                tank2.printTank();
                tank1.py = fond.val_y[(int) tank1.px] + 3;
                tank2.py = fond.val_y[(int) tank2.px] + 3;
                if (tank1.py < -20) {
                    tank1.life--;
                }
                if (tank2.py < -20) {
                    tank2.life--;
                }
                if (tank1.life > 0 && tank2.life > 0) {
                    display.displayScore(tank1.life, tank2.life);
                }
                display.displayWind(vent);
                display.displayPuiss(puiss);
                shellsTab = display.displayShells(tank1, tank2);
                if (StdDraw.mousePressed()) {
                    if (StdDraw.mouseY() >= 410 && StdDraw.mouseY() <= 430) {
                        if (StdDraw.mouseX() >= 570 && StdDraw.mouseX() <= 670) {
                            puiss = (int) StdDraw.mouseX() - 100;
                        }

                    }
                }
                display.displayFuel(tank1.fuel, tank2.fuel);
                display.displayAngle(tank1.canon_position, tank2.canon_position);
                if (player == 0) {
                    tank1.useCanon();
                    tank1.moveTank(fond.val_y);
                    if (StdDraw.isKeyPressed(KeyEvent.VK_SPACE)) {
                        if (shellsTab[0] == 0) {
                            if (cShell.shot(tank1, fond, puiss - 470, vent, tank2)) {
                                tank2.life -= 20;
                            }
                            player = 1;
                        } else if (shellsTab[0] == 1 && tank1.vertical_shell > 0) {
                            if (shell1.shot(tank1, fond, puiss - 470, vent, tank2)) {
                                tank2.life -= 30;
                            }
                            player = 1;
                            tank1.vertical_shell--;
                        } else if (shellsTab[0] == 2 && tank1.bar_shell > 0) {
                            if (bshell.shot(tank1, fond, puiss - 470, vent, tank2)) {
                                tank2.life -= 20;
                            }
                            player = 1;
                            tank1.bar_shell--;
                        } else if (shellsTab[0] == 3 && tank1.bombeH > 0) {
                            if (hShell.shot(tank1, fond, puiss - 470, vent, tank2)) {
                                tank2.life -= 50;
                            }
                            player = 1;
                            tank1.bombeH--;
                        } else if (shellsTab[0] == 4 && tank1.bombeMat > 0) {
                            if (mShell.shot(tank1, fond, puiss - 470, vent, tank2)) {
                                tank2.life -= 10;
                            }
                            player = 1;
                            tank1.bombeMat--;
                        }
                    }
                    if (player == 1) {
                        do {
                            vent = (int) (-60 + Math.random() * 120);
                        } while (vent == 0);
                    }
                } else {
                    tank2.useCanon();
                    tank2.moveTank(fond.val_y);
                    if (StdDraw.isKeyPressed(KeyEvent.VK_SPACE)) {
                        if (shellsTab[1] == 0) {
                            if (cShell.shot(tank2, fond, puiss - 470, vent, tank1)) {
                                tank1.life -= 20;
                            }
                            player = 0;
                        } else if (shellsTab[1] == 1 && tank2.vertical_shell > 0) {
                            if (shell1.shot(tank2, fond, puiss - 470, vent, tank1)) {
                                tank1.life -= 30;
                            }
                            player = 0;
                            tank2.vertical_shell--;
                        } else if (shellsTab[1] == 2 && tank2.bar_shell > 0) {
                            if (bshell.shot(tank2, fond, puiss - 470, vent, tank1)) {
                                tank1.life -= 20;
                            }
                            player = 0;
                            tank2.bar_shell--;
                        } else if (shellsTab[1] == 3 && tank2.bombeH > 0) {
                            if (hShell.shot(tank2, fond, puiss - 470, vent, tank1)) {
                                tank1.life -= 50;
                            }
                            player = 0;
                            tank2.bombeH--;
                        } else if (shellsTab[1] == 4 && tank2.bombeMat > 0) {
                            if (mShell.shot(tank2, fond, puiss - 470, vent, tank1)) {
                                tank1.life -= 10;
                            }
                            player = 0;
                            tank2.bombeMat--;
                        }
                    }
                    if (player == 0) {
                        do {
                            vent = (int) (-60 + Math.random() * 120);
                        } while (vent == 0);
                    }
                }
                if (StdDraw.mousePressed()) {
                    if (StdDraw.mouseY() >= 465 && StdDraw.mouseY() <= 505) {
                        if (StdDraw.mouseX() >= 960 && StdDraw.mouseX() <= 1000) {
                            step = states.INFOS;
                        }

                    }
                }
                if (StdDraw.mousePressed()) {
                    if (StdDraw.mouseY() >= 465 && StdDraw.mouseY() <= 505) {
                        if (StdDraw.mouseX() >= 0 && StdDraw.mouseX() <= 40) {
                            step = states.PAUSE;
                        }

                    }
                }
                if (StdDraw.isKeyPressed(KeyEvent.VK_P)) {
                    choice = 0;
                    step = states.PAUSE;
                }
                if (StdDraw.isKeyPressed(KeyEvent.VK_I)) {
                    step = states.INFOS;
                }
            } else if (step == states.INFOS) {
                step = playInfos();
            } else if (step == states.PAUSE) {
                step2 = playPause();
                if (step2 == states.SAUV) {
                    String res;
                    res = enreg.saveGame(tank1, tank2, fond);
                    StdDraw.setPenColor(Color.BLACK);
                    StdDraw.text(500, 250, res);
                    StdDraw.show(500);
                }
                if (step2 == states.JEU) {
                    step = step2;
                }
                if (step2 == states.INITJEUCHARGE) {
                    step = step2;
                }
                if (step2 == states.CHOOSEMAP) {
                    step = step2;
                }
            } else if (step == states.END) {

                display.endDisplay();
                display.displayScore(tank1.life, tank2.life);
                StdDraw.setPenColor(Color.BLACK);
                StdDraw.text(500, 300, "Partie terminée!");
                if (tank1.life == 0) {
                    StdDraw.text(500, 250, "joueur 2 Champion!!");
                } else {
                    StdDraw.text(500, 250, "joueur 1 Champion!!");
                }
                StdDraw.text(500, 150, "Pressez R pour rejouer!");

                if (StdDraw.isKeyPressed(KeyEvent.VK_R)) {
                    step = states.CHOOSEMAP;
                }
            }

            if (tank1.life == 0 || tank2.life == 0) {
                step = states.END;
            }

            StdDraw.show(20);
            StdDraw.clear();
        }

        System.exit(
                0);
    }

    public static int playFont(font fond) {
        if (StdDraw.isKeyPressed(KeyEvent.VK_ENTER)) {
            if (choice == 0) {
                return 0;
            }
            if (choice == 1) {
                return 1;
            }
            if (choice == 2) {
                return 2;
            }
        }
        if (StdDraw.mousePressed()) {
            if (StdDraw.mouseY() >= 304 && StdDraw.mouseY() <= 336) {
                if (StdDraw.mouseX() >= 420 && StdDraw.mouseX() <= 580) {
                    return 0;
                }

            }
        }
        if (StdDraw.mousePressed()) {
            if (StdDraw.mouseY() >= 234 && StdDraw.mouseY() <= 266) {
                if (StdDraw.mouseX() >= 420 && StdDraw.mouseX() <= 580) {
                    return 1;
                }

            }
        }
        if (StdDraw.mousePressed()) {
            if (StdDraw.mouseY() >= 164 && StdDraw.mouseY() <= 196) {
                if (StdDraw.mouseX() >= 420 && StdDraw.mouseX() <= 580) {
                    return 2;
                }

            }
        }
        if (StdDraw.isKeyPressed(KeyEvent.VK_DOWN)) {
            if (choice < 2) {
                choice++;
            }
        }
        if (StdDraw.isKeyPressed(KeyEvent.VK_UP)) {
            if (choice > 0) {
                choice--;
            }
        }
        StdDraw.setPenColor(Color.ORANGE);
        StdDraw.filledRectangle(500, 320, 80, 16);
        StdDraw.filledRectangle(500, 250, 80, 16);
        StdDraw.filledRectangle(500, 180, 80, 16);
        if (choice == 0) {
            StdDraw.setPenColor(Color.RED);
            StdDraw.rectangle(500, 320, 80, 16);
            StdDraw.text(500, 320, "Lisse");
            StdDraw.setPenColor(Color.BLACK);
            StdDraw.text(500, 250, "Normal");
            StdDraw.text(500, 180, "Rugueux");
        } else if (choice == 1) {
            StdDraw.setPenColor(Color.RED);
            StdDraw.rectangle(500, 250, 80, 16);
            StdDraw.text(500, 250, "Normal");
            StdDraw.setPenColor(Color.BLACK);
            StdDraw.text(500, 320, "Lisse");
            StdDraw.text(500, 180, "Rugueux");
        } else if (choice == 2) {
            StdDraw.setPenColor(Color.RED);
            StdDraw.rectangle(500, 180, 80, 16);
            StdDraw.text(500, 180, "Rugueux");
            StdDraw.setPenColor(Color.BLACK);
            StdDraw.text(500, 320, "Lisse");
            StdDraw.text(500, 250, "Normal");
        }
        return -1;
    }

    public static states playMenu() {

        if (StdDraw.isKeyPressed(KeyEvent.VK_ENTER)) {
            if (choice == 0) {
                StdDraw.show(100);
                return states.CHOOSEMAP;
            }
            if (choice == 1) {
                return states.INITJEUCHARGE;
            }
        }
        if (StdDraw.mousePressed()) {
            if (StdDraw.mouseY() >= 200 && StdDraw.mouseY() <= 300) {
                if (StdDraw.mouseX() >= 200 && StdDraw.mouseX() <= 400) {
                    return states.CHOOSEMAP;
                }

            }
            if (StdDraw.mouseY() >= 200 && StdDraw.mouseY() <= 300) {
                if (StdDraw.mouseX() >= 600 && StdDraw.mouseX() <= 800) {
                    return states.INITJEUCHARGE;
                }

            }
        }

        if (StdDraw.isKeyPressed(KeyEvent.VK_RIGHT)) {
            if (choice < 1) {
                choice++;
            }
        }
        if (StdDraw.isKeyPressed(KeyEvent.VK_LEFT)) {
            if (choice > 0) {
                choice--;
            }
        }

        StdDraw.setPenColor(Color.ORANGE);
        StdDraw.filledRectangle(300, 250, 100, 50);
        StdDraw.filledRectangle(700, 250, 100, 50);

        if (choice == 0) {
            StdDraw.setPenColor(Color.RED);
            StdDraw.rectangle(300, 250, 100, 50);
            StdDraw.text(300, 250, "JOUER");
            StdDraw.setPenColor(Color.BLACK);
            StdDraw.text(700, 250, "CHARGER");
        } else if (choice == 1) {
            StdDraw.setPenColor(Color.RED);
            StdDraw.rectangle(700, 250, 100, 50);
            StdDraw.text(700, 250, "CHARGER");
            StdDraw.setPenColor(Color.BLACK);
            StdDraw.text(300, 250, "JOUER");
        }

        return states.MENU;
    }

    public static states playPause() {

        if (StdDraw.isKeyPressed(KeyEvent.VK_ENTER)) {
            if (choice == 0) {
                return states.JEU;
            }
            if (choice == 1) {
                return states.INITJEUCHARGE;
            }
            if (choice == 2) {
                return states.SAUV;
            }
            if (choice == 3) {
                choice = 0;
                StdDraw.show(20);
                return states.CHOOSEMAP;
            }
        }
        if (StdDraw.mousePressed()) {
            if (StdDraw.mouseY() >= 200 && StdDraw.mouseY() <= 300) {
                if (StdDraw.mouseX() >= 50 && StdDraw.mouseX() <= 250) {
                    return states.JEU;
                }

            }

            if (StdDraw.mouseY() >= 50 && StdDraw.mouseY() <= 150) {
                if (StdDraw.mouseX() >= 400 && StdDraw.mouseX() <= 600) {
                    return states.CHOOSEMAP;
                }

            }
            if (StdDraw.mouseY() >= 200 && StdDraw.mouseY() <= 300) {
                if (StdDraw.mouseX() >= 400 && StdDraw.mouseX() <= 600) {
                    return states.INITJEUCHARGE;
                }

            }
            if (StdDraw.mouseY() >= 200 && StdDraw.mouseY() <= 300) {
                if (StdDraw.mouseX() >= 750 && StdDraw.mouseX() <= 950) {
                    return states.SAUV;
                }

            }
        }

        StdDraw.setPenColor(Color.ORANGE);
        StdDraw.filledRectangle(150, 250, 100, 50);
        StdDraw.filledRectangle(500, 250, 100, 50);
        StdDraw.filledRectangle(850, 250, 100, 50);
        StdDraw.filledRectangle(500, 100, 100, 50);

        if (choice == 0) {
            StdDraw.setPenColor(Color.RED);
            StdDraw.rectangle(150, 250, 100, 50);
            StdDraw.text(150, 250, "CONTINUER");
            StdDraw.setPenColor(Color.BLACK);
            StdDraw.text(500, 250, "CHARGER");
            StdDraw.text(850, 250, "SAUVEGARDER");
            StdDraw.text(500, 100, "REJOUER");
        } else if (choice == 1) {
            StdDraw.setPenColor(Color.RED);
            StdDraw.rectangle(500, 250, 100, 50);
            StdDraw.text(500, 250, "CHARGER");
            StdDraw.setPenColor(Color.BLACK);
            StdDraw.text(150, 250, "CONTINUER");
            StdDraw.text(850, 250, "SAUVEGARDER");
            StdDraw.text(500, 100, "REJOUER");
        } else if (choice == 2) {
            StdDraw.setPenColor(Color.RED);
            StdDraw.rectangle(850, 250, 100, 50);
            StdDraw.text(850, 250, "SAUVEGARDER");
            StdDraw.setPenColor(Color.BLACK);
            StdDraw.text(150, 250, "CONTINUER");
            StdDraw.text(500, 250, "CHARGER");
            StdDraw.text(500, 100, "REJOUER");
        } else if (choice == 3) {
            StdDraw.setPenColor(Color.RED);
            StdDraw.rectangle(500, 100, 100, 50);
            StdDraw.text(500, 100, "REJOUER");
            StdDraw.setPenColor(Color.BLACK);
            StdDraw.text(150, 250, "CONTINUER");
            StdDraw.text(500, 250, "CHARGER");
            StdDraw.text(850, 250, "SAUVEGARDER");
        }
        StdDraw.text(500, 400, "'ECHAP' pour quitter");
        if (StdDraw.isKeyPressed(KeyEvent.VK_RIGHT)) {
            if (choice < 3) {
                choice++;
            } else {
                choice = 0;
            }
            StdDraw.show(100);
        }
        if (StdDraw.isKeyPressed(KeyEvent.VK_LEFT)) {
            if (choice > 0) {
                choice--;
            } else {
                choice = 3;
            }
            StdDraw.show(100);
        }
        if (StdDraw.isKeyPressed(KeyEvent.VK_UP) || StdDraw.isKeyPressed(KeyEvent.VK_DOWN)) {
            if (choice < 3) {
                choice = 3;
            } else {
                choice = 0;
            }
            StdDraw.show(100);
        }

        return states.MENU;
    }

    public static states playInfos() {

        StdDraw.setPenColor(Color.BLACK);
        StdDraw.text(500, 450, "Chaque tank dispose de 100 point de vie.");
        StdDraw.text(500, 420, "Vous avez dans votre arsenal 5 armes différentes : ");
        StdDraw.text(500, 380, "Classic : (vie -20) tir normal");
        StdDraw.text(500, 350, "Vertical : (vie -30) la balle adopte une trajectoire différente une fois l'apogée atteinte");
        StdDraw.text(500, 320, "Barrage : (vie -20) la balle se scinde en trois une fois l'apogée atteinte");
        StdDraw.text(500, 290, "Bombe H : (vie -50) Une bombe nucléaire (1 seul essai)");
        StdDraw.text(500, 260, "Bombe à matière : (vie -10) envie d'un peu de calme, créez une barrière.");
        StdDraw.text(500, 220, "Le tank se déplace avec les flèches directionnels");
        StdDraw.text(500, 190, "Langle de tir se règle avec les flèches du haut et du bas.");
        StdDraw.text(500, 160, "Appuyez sur la touche espace pour tirer !!");
        StdDraw.text(500, 80, "Entrée pour reprendre !");
        if (StdDraw.isKeyPressed(KeyEvent.VK_ENTER)) {
            return states.JEU;
        }
        return states.INFOS;
    }
}

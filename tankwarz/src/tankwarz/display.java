import java.awt.Color;
import java.awt.event.KeyEvent;

import java.awt.Color;
import java.awt.event.MouseEvent;

public class display {

    public static int length = 300;
    public static double tabX[] = new double[length];
    public static double tabY[] = new double[length];
    public static Color colors[] = {Color.MAGENTA, Color.CYAN, Color.RED, Color.YELLOW, Color.BLUE, Color.GREEN, Color.ORANGE, Color.PINK};
    public static int choice1 = 0;
    public static int choice2 = 0;
    public static boolean flag = false;

    public display() {
        for (int i = 0; i < length; i++) {
            tabY[i] = Math.random() * 530;
            tabX[i] = Math.random() * 1200;
        }
    }

    public static void endDisplay() {
        for (int i = 0; i < length; i++) {
            if (tabY[i] <= -10) {
                tabY[i] = 530;
                tabX[i] = Math.random() * 1200;
            } else {
                tabY[i] -= 3;
            }
            StdDraw.setPenColor(colors[i % colors.length]);
            StdDraw.filledCircle(tabX[i], tabY[i], 4);
        }

    }

    public static int[] displayShells(tank tank1, tank tank2) {
        int tab[] = {0, 0};
        StdDraw.text(10, 330, "<");
        StdDraw.text(190, 330, ">");
        StdDraw.text(990, 330, ">");
        StdDraw.text(810, 330, "<");
        if (StdDraw.mousePressed() && !flag) {
            if (StdDraw.mouseY() >= 325 && StdDraw.mouseY() <= 335) {
                if (StdDraw.mouseX() >= 0 && StdDraw.mouseX() <= 20) {
                    if (choice1 > 0) {
                        choice1--;
                    } else {
                        choice1 = 4;
                    }
                    flag = true;
                }
            }
            if (StdDraw.mouseY() >= 325 && StdDraw.mouseY() <= 335) {
                if (StdDraw.mouseX() >= 180 && StdDraw.mouseX() <= 200) {
                    if (choice1 < 4) {
                        choice1++;
                    } else {
                        choice1 = 0;
                    }
                    flag = true;
                }
            }
            if (StdDraw.mouseY() >= 325 && StdDraw.mouseY() <= 335) {
                if (StdDraw.mouseX() >= 800 && StdDraw.mouseX() <= 820) {
                    if (choice2 > 0) {
                        choice2--;
                    } else {
                        choice2 = 4;
                    }
                    flag = true;
                }
            }
            if (StdDraw.mouseY() >= 325 && StdDraw.mouseY() <= 335) {
                if (StdDraw.mouseX() >= 980 && StdDraw.mouseX() <= 1000) {
                    if (choice2 < 4) {
                        choice2++;
                    } else {
                        choice2 = 0;
                    }
                    flag = true;
                }
            }
        } else {
            flag = false;
        }
        if (choice1 == 0) {
            StdDraw.text(100, 330, "Classic");
        }
        if (choice1 == 1) {
            StdDraw.text(100, 330, "Vertical : " + tank1.vertical_shell);
        } else if (choice1 == 2) {
            StdDraw.text(100, 330, "Barrage : " + tank1.bar_shell);
        } else if (choice1 == 3) {
            StdDraw.text(100, 330, "Bombe H : " + tank1.bombeH);
        } else if (choice1 == 4) {
            StdDraw.text(100, 330, "Bombe Mat : " + tank1.bombeMat);
        }

        if (choice2 == 0) {
            StdDraw.text(900, 330, "Classic");
        }
        if (choice2 == 1) {
            StdDraw.text(900, 330, "Vertical : " + tank2.vertical_shell);
        } else if (choice2 == 2) {
            StdDraw.text(900, 330, "Barrage : " + tank2.bar_shell);
        } else if (choice2 == 3) {
            StdDraw.text(900, 330, "Bombe H : " + tank2.bombeH);
        } else if (choice2 == 4) {
            StdDraw.text(900, 330, "Bombe Mat : " + tank2.bombeMat);
        }
        tab[0] = choice1;
        tab[1] = choice2;
        return tab;
    }

    public static void displayScore(double s1, double s2) {
        StdDraw.setPenColor(Color.BLACK);

        StdDraw.text(100, 450, "joueur 1:");
        StdDraw.text(900, 450, "joueur 2:");

        StdDraw.rectangle(100, 420, 100, 15);
        StdDraw.rectangle(900, 420, 100, 15);

        StdDraw.setPenColor(Color.RED);
        StdDraw.filledRectangle(100 - (95 - (95 * (s1 / 100))), 420, (95 * (s1 / 100)), 10);

        StdDraw.setPenColor(Color.BLUE);
        StdDraw.filledRectangle(900 + (95 - (95 * (s2 / 100))), 420, (95 * (s2 / 100)), 10);

        StdDraw.setPenColor(Color.BLACK);
        StdDraw.text(100, 417, (Double.toString(s1) + '%'));
        StdDraw.text(900, 417, (Double.toString(s2) + '%'));
        StdDraw.picture(980, 485, "info.gif");
        StdDraw.picture(20, 485, "pause.png");

    }

    public static void displayWind(int vent) {
        StdDraw.setPenColor(Color.BLACK);
        if (vent > 0) {
            String val = "vent : " + vent + "Km/h";
            StdDraw.text(300, 420, val);
            StdDraw.picture(320, 380, "manched.png");
        } else {
            String val = "vent : " + (-vent) + "Km/h";
            StdDraw.text(300, 420, val);
            StdDraw.picture(280, 380, "mancheg.png");
        }

    }

    public static void displayPuiss(int puiss) {
        int puissA = puiss - 470;
        String valeur = puissA + "%";
        StdDraw.setPenColor(Color.BLACK);
        StdDraw.text(500, 420, "puissance : ");
        StdDraw.text(700, 420, valeur);
        for (int i = 422; i > 417; i--) {
            StdDraw.line(570, i, 670, i);
        }
        StdDraw.setPenRadius(0.008);
        StdDraw.line(100 + puiss, 430, 100 + puiss, 410);
    }

    public static void displayFuel(int f1, int f2) {
        StdDraw.text(100, 390, "fuel : " + (Integer.toString(f1)));
        StdDraw.text(900, 390, "fuel : " + (Integer.toString(f2)));
    }

    public static void displayAngle(int a1, int a2) {
        StdDraw.text(100, 360, "inclinaison : " + (Integer.toString(a1)) + "°");
        StdDraw.text(900, 360, "inclinaison : " + (Integer.toString(a2)) + "°");
    }
}

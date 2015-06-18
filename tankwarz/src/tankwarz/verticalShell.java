import java.awt.Color;
import java.lang.Math;

public class verticalShell extends shell {

    public verticalShell(double px, double py) {
        super(px, py);
    }

    public boolean shot(tank tank, font fond, double puiss, int vent, tank tank2) {
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
        double posX;
        double posY = tank.py;
        double departX = (tank.px + 18 * Math.cos(Math.toRadians(tank.canon_position)));
        double departY = (tank.py + 2 + 18 * Math.sin(Math.toRadians(tank.canon_position)));
        double cosinus = Math.cos(Math.toRadians(tank.canon_position));
        double tan = Math.tan(Math.toRadians(tank.canon_position));

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
            posX = avance + departX;
            posY = (py + departY);
            StdDraw.setPenColor(StdDraw.BLACK);
            StdDraw.filledCircle(posX, posY, 3);
            StdDraw.show(1);
            if (!chute) {
                posYpre = py;
            }
            py = (int) (((-ay * avance * avance) / (2 * puiss2 * cosinus * cosinus) + (tan * avance)));
            if (posYpre > py) {
                chute = true;
                py = posYpre - 5 * departChute;
                departChute++;
            }

            if (tank.canon_position > 90) {
                avance -= 1 * (1 - (vent / 100));
            } else {
                avance += 1 * (1 - (vent / 100));
            }

            StdDraw.setPenColor(tank.color);
            StdDraw.filledCircle(posX, posY, 4);

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
        }

        return tankTouched;
    }
}

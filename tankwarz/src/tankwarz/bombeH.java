public class bombeH extends shell {

    public bombeH(double px, double py) {
        super(px, py);
    }

    public boolean shot(tank tank, font fond, double puiss, double vent, tank tank2) {
        boolean tankTouched = false;
        boolean tankTouched2 = false;
        tir = true;
        double[] val_y = fond.val_y;
        double[] val_x = fond.val_x;
        int avance = 0;
        double posX;
        double posY;
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

            py = (int) (((-ay * avance * avance) / (2 * puiss2 * cosinus * cosinus) + (tan * avance)));
            if (tank.canon_position > 90) {
                avance -= 1;
            } else {
                avance += 1;
            }

            tankTouched = tankCollision(posX, posY, tank2);

            if (tankTouched) {
                tir = false;
                if (posX < 990 || posX > 10) {
                    py = super.explosion(posX, posY, 150, fond);
                }

                return tankCollisionH(posX, posY, 150, tank2);
            }

            if (posX > 1100 || posX < -100) {
                tir = false;
            }
            if (posX > 0 && posX < 1000) {
                if (posY <= val_y[(int) posX]) {
                    tir = false;
                    if (posX < 990 || posX > 10) {
                        py = super.explosion(posX, posY, 150, fond);
                    }
                }
            }
            StdDraw.setPenColor(tank.color);
            StdDraw.filledCircle(posX, posY, 4);
            tankTouched2 = tankCollisionH(posX, posY, 150, tank2);
        }
        return tankTouched2;
    }

}

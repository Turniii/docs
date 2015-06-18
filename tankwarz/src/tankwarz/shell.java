import java.awt.Color;
import java.awt.event.KeyEvent;

public abstract class shell {

    protected double ay;
    protected double px;
    protected double py;
    protected double t;
    protected double v0;
    protected int impact;
    protected int power;
    protected boolean tir;

    public shell(double px, double py) {
        this.ay = 9.8;
        this.px = px;
        this.py = py;
        power = 100;
        t = 0;
    }

    protected double implosion(double posX, double posY, int rayon, font fond) {
        StdDraw.setPenColor(StdDraw.RED);
        StdDraw.filledCircle(posX, posY, rayon);
        StdDraw.setPenColor(StdDraw.BOOK_RED);
        StdDraw.filledCircle(posX, posY, rayon / 1.3);
        StdDraw.setPenColor(StdDraw.ORANGE);
        StdDraw.filledCircle(posX, posY, rayon / 2);
        StdDraw.setPenColor(StdDraw.YELLOW);
        StdDraw.filledCircle(posX, posY, rayon / 3);
        StdDraw.setPenColor(StdDraw.WHITE);
        StdDraw.filledCircle(posX, posY, rayon / 5);
        StdDraw.show(100);
        StdDraw.setPenColor(StdDraw.BOOK_RED);
        StdDraw.filledCircle(posX, posY, rayon / 1.3);
        StdDraw.setPenColor(StdDraw.ORANGE);
        StdDraw.filledCircle(posX, posY, rayon / 2);
        StdDraw.setPenColor(StdDraw.YELLOW);
        StdDraw.filledCircle(posX, posY, rayon / 3);
        StdDraw.setPenColor(StdDraw.WHITE);
        StdDraw.filledCircle(posX, posY, rayon / 5);
        StdDraw.show(100);
        StdDraw.setPenColor(StdDraw.ORANGE);
        StdDraw.filledCircle(posX, posY, rayon / 2);
        StdDraw.setPenColor(StdDraw.YELLOW);
        StdDraw.filledCircle(posX, posY, rayon / 3);
        StdDraw.setPenColor(StdDraw.WHITE);
        StdDraw.filledCircle(posX, posY, rayon / 5);
        StdDraw.show(100);
        StdDraw.setPenColor(StdDraw.YELLOW);
        StdDraw.filledCircle(posX, posY, rayon / 3);
        StdDraw.setPenColor(StdDraw.WHITE);
        StdDraw.filledCircle(posX, posY, rayon / 5);
        StdDraw.show(100);
        StdDraw.setPenColor(StdDraw.WHITE);
        StdDraw.filledCircle(posX, posY, rayon / 5);
        StdDraw.show(100);
        fond.ajouterMat(posX, posY, rayon);
        return 0;
    }

    protected double explosion(double posX, double posY, int rayon, font fond) {
        StdDraw.setPenColor(StdDraw.WHITE);
        StdDraw.filledCircle(posX, posY, rayon / 5);
        StdDraw.show(100);
        StdDraw.setPenColor(StdDraw.WHITE);
        StdDraw.filledCircle(posX, posY, rayon / 5);
        StdDraw.setPenColor(StdDraw.YELLOW);
        StdDraw.filledCircle(posX, posY, rayon / 3);
        StdDraw.show(100);
        StdDraw.setPenColor(StdDraw.WHITE);
        StdDraw.filledCircle(posX, posY, rayon / 5);
        StdDraw.setPenColor(StdDraw.YELLOW);
        StdDraw.filledCircle(posX, posY, rayon / 3);
        StdDraw.setPenColor(StdDraw.ORANGE);
        StdDraw.filledCircle(posX, posY, rayon / 2);
        StdDraw.show(100);
        StdDraw.setPenColor(StdDraw.WHITE);
        StdDraw.filledCircle(posX, posY, rayon / 5);
        StdDraw.setPenColor(StdDraw.YELLOW);
        StdDraw.filledCircle(posX, posY, rayon / 3);
        StdDraw.setPenColor(StdDraw.ORANGE);
        StdDraw.filledCircle(posX, posY, rayon / 2);
        StdDraw.setPenColor(StdDraw.BOOK_RED);
        StdDraw.filledCircle(posX, posY, rayon / 1.3);
        StdDraw.show(100);
        StdDraw.setPenColor(StdDraw.WHITE);
        StdDraw.filledCircle(posX, posY, rayon / 5);
        StdDraw.setPenColor(StdDraw.YELLOW);
        StdDraw.filledCircle(posX, posY, rayon / 3);
        StdDraw.setPenColor(StdDraw.ORANGE);
        StdDraw.filledCircle(posX, posY, rayon / 2);
        StdDraw.setPenColor(StdDraw.BOOK_RED);
        StdDraw.filledCircle(posX, posY, rayon / 1.3);
        StdDraw.setPenColor(StdDraw.RED);
        StdDraw.filledCircle(posX, posY, rayon);
        StdDraw.show(100);
        fond.ajouterImpact(posX, posY, rayon);
        return 0;
    }

    public boolean tankCollision(double posX, double posY, tank tank) {
        if (posX < tank.px + 12 && posX > tank.px - 12) {
            if (posY > tank.py - 4 && posY < tank.py + 4) {
                return true;
            }
        }
        if (posX < tank.px + 3 && posX > tank.px - 3) {
            if (posY > tank.py - 4 && posY < tank.py + 8) {
                return true;
            }
        }

        return false;
    }

    public boolean tankCollisionH(double posX, double posY, double rayon, tank tank) {
        double dist = Math.sqrt(Math.pow(posX - tank.px - 12, 2)
                + Math.pow(posY - tank.py - 4, 2));
        return dist < rayon;
    }
}

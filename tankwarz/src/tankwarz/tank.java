import java.awt.Color;
import java.awt.event.KeyEvent;

public class tank {

    protected double px;
    protected double py;
    protected int canon_position;
    protected int life;
    protected Color color;
    protected int fuel;
    protected int bar_shell;
    protected int vertical_shell;
    protected int bombeH;
    protected int bombeMat;

    public tank(int bar_shell, int vertical_shell, double px, double py, int canon_position, Color color, int life) {
        this.bar_shell = bar_shell;
        this.vertical_shell = vertical_shell;
        this.bombeH = 1;
        this.bombeMat = 10;
        this.px = px;
        this.py = py;
        this.canon_position = canon_position;
        this.color = color;
        this.life = life;
        this.fuel = 200;
    }

    public void moveTank(double[] val_y) {
        if (fuel > 0) {
            if (StdDraw.isKeyPressed(KeyEvent.VK_LEFT)) {
                if (px > 1) {
                    px--;
                    fuel--;
                }
            }
            if (StdDraw.isKeyPressed(KeyEvent.VK_RIGHT)) {
                if (px < 999) {
                    px++;
                    fuel--;
                }
            }
            py = val_y[(int) px] + 3;
        }
    }

    public void useCanon() {
        if (StdDraw.isKeyPressed(KeyEvent.VK_UP)) {
            if (canon_position < 179) {
                canon_position += 2;
            }
        }
        if (StdDraw.isKeyPressed(KeyEvent.VK_DOWN)) {
            if (canon_position > 1) {
                canon_position -= 2;
            }
        }
    }

    public void printTank() {
        double RADIUS = 2.8;
        StdDraw.setPenColor(color);
        StdDraw.setPenRadius(0.004);
        StdDraw.line(px, py + 4,
                px + 14 * Math.cos(Math.toRadians(canon_position)),
                py + 2 + 14 * Math.sin(Math.toRadians(canon_position)));
        StdDraw.setPenRadius();
        StdDraw.filledEllipse(px, py + 1, 12, 4);
        StdDraw.filledCircle(px, py + 4, RADIUS + 1.5);

        StdDraw.setPenColor(Color.BLACK);

        StdDraw.filledCircle(px - 9, py - 1, RADIUS);
        StdDraw.filledCircle(px - 4.5, py - 1, RADIUS);
        StdDraw.filledCircle(px + 4.5, py - 1, RADIUS);
        StdDraw.filledCircle(px, py - 1, RADIUS);
        StdDraw.filledCircle(px + 9, py - 1, RADIUS);
    }
}

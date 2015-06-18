import java.awt.Color;

public class font {

    private double randVal[];
    protected double val_x[];
    protected double val_y[];
    private double ajout;
    private int x;
    private int y;
    private int it;
    private double z;
    public double impactX[];
    public double impactY[];

    public font(String param) {
        it = 0;
        this.impactX = new double[100];
        this.impactY = new double[100];
        this.val_x = new double[1001];
        this.val_y = new double[1001];
        this.randVal = new double[15];
        if ("1".equals(param)) {
            //rugueux
            x = 200;
            y = 170;
            z = 2;
        } else if ("2".equals(param)) {
            //plat
            x = 150;
            y = 60;
            z = 1.5;
        }
        randVal[0] = 50 + (Math.random() * (x - 50));
        randVal[1] = 20 + (Math.random() * (y - 20));
        randVal[2] = 1 + (Math.random() * (z - 1));
        randVal[3] = 50 + (Math.random() * (x - 50));
        randVal[4] = 20 + (Math.random() * (y - 20));
        randVal[5] = 1 + (Math.random() * (z - 1));
        randVal[6] = 50 + (Math.random() * (x - 50));
        randVal[7] = 20 + (Math.random() * (y - 20));
        randVal[8] = 1 + (Math.random() * (z - 1));
        randVal[9] = 50 + (Math.random() * (x - 50));
        randVal[10] = 20 + (Math.random() * (y - 20));
        randVal[11] = 1 + (Math.random() * (z - 1));
        randVal[12] = 50 + (Math.random() * (x - 50));
        randVal[13] = 20 + (Math.random() * (y - 20));
        randVal[14] = 1 + (Math.random() * (z - 1));
        for (int i = 0; i < 1000; i++) {
            val_y[i] = randVal[0] + randVal[1] * Math.cos(randVal[2] * Math.toRadians(i));
            this.val_x[i] = i;

        }
        for (int i = 0; i < 1000; i++) {
            ajout = randVal[3] + randVal[4] * Math.cos(randVal[5] * Math.toRadians(i));
            if (ajout > val_y[i]) {
                val_y[i] = ajout;
            }
        }
        for (int i = 0; i < 1000; i++) {
            ajout = randVal[6] + randVal[7] * Math.cos(randVal[8] * Math.toRadians(i));
            if (ajout > val_y[i]) {
                val_y[i] = ajout;
            }
        }
        for (int i = 0; i < 1000; i++) {
            ajout = randVal[9] + randVal[10] * Math.sin(randVal[11] * Math.toRadians(i));
            if (ajout > val_y[i]) {
                val_y[i] = ajout;
            }
        }
        for (int i = 0; i < 1000; i++) {
            ajout = randVal[12] + randVal[13] * Math.sin(randVal[14] * Math.toRadians(i));
            if (ajout > val_y[i]) {
                val_y[i] = ajout;
            }
        }

        this.val_y[0] = -20;
        this.val_x[0] = -55;
        this.val_y[1000] = -20;
        this.val_x[1000] = 1055;

    }

    public font() {
        it = 0;
        this.val_x = new double[1001];
        this.val_y = new double[1001];
        this.impactX = new double[100];
        this.impactY = new double[100];
        this.randVal = new double[15];
        randVal[0] = 50 + (Math.random() * (150 - 50));
        randVal[1] = 20 + (Math.random() * (60 - 20));
        randVal[2] = 1 + (Math.random() * (2 - 1));
        randVal[3] = 50 + (Math.random() * (150 - 50));
        randVal[4] = 20 + (Math.random() * (60 - 20));
        randVal[5] = 1 + (Math.random() * (2 - 1));
        randVal[6] = 50 + (Math.random() * (150 - 50));
        randVal[7] = 20 + (Math.random() * (60 - 20));
        randVal[8] = 1 + (Math.random() * (2 - 1));
        randVal[9] = 50 + (Math.random() * (150 - 50));
        randVal[10] = 20 + (Math.random() * (60 - 20));
        randVal[11] = 1 + (Math.random() * (2 - 1));
        randVal[12] = 50 + (Math.random() * (150 - 50));
        randVal[13] = 20 + (Math.random() * (60 - 20));
        randVal[14] = 1 + (Math.random() * (2 - 1));
        for (int i = 0; i < 1000; i++) {
            val_y[i] = randVal[0] + randVal[1] * Math.cos(randVal[2] * Math.toRadians(i));
            this.val_x[i] = i;

        }
        for (int i = 0; i < 1000; i++) {
            ajout = randVal[3] + randVal[4] * Math.cos(randVal[5] * Math.toRadians(i));
            if (ajout > val_y[i]) {
                val_y[i] = ajout;
            }
        }
        for (int i = 0; i < 1000; i++) {
            ajout = randVal[6] + randVal[7] * Math.cos(randVal[8] * Math.toRadians(i));
            if (ajout > val_y[i]) {
                val_y[i] = ajout;
            }
        }
        for (int i = 0; i < 1000; i++) {
            ajout = randVal[9] + randVal[10] * Math.sin(randVal[11] * Math.toRadians(i));
            if (ajout > val_y[i]) {
                val_y[i] = ajout;
            }
        }
        for (int i = 0; i < 1000; i++) {
            ajout = randVal[12] + randVal[13] * Math.sin(randVal[14] * Math.toRadians(i));
            if (ajout > val_y[i]) {
                val_y[i] = ajout;
            }
        }

        this.val_y[0] = -20;
        this.val_x[0] = -20;
        this.val_y[1000] = 0;
        this.val_x[1000] = 1000;

    }

    public void ajouterMat(double posX, double posY, int rayon) {
        for (int i = 0; i <= rayon / 2; i++) {
            if (posX - i > 0) {
                this.val_y[(int) posX - i] = this.val_y[(int) posX - i] + (rayon * 3 + i);
            }
        }
        for (int i = 1; i <= rayon / 2; i++) {
            if (posX + i < 1000) {
                this.val_y[(int) posX + i] = this.val_y[(int) posX + i] + (rayon * 3 + i);
            }
        }
    }

    public void ajouterImpact(double posX, double posY, int rayon) {
        Music music = new Music();
        music.playSound2("bombe.wav", 5.0f);
        for (int i = 0; i <= rayon; i++) {
            if (posX - i > 0) {
                this.val_y[(int) posX - i] = this.val_y[(int) posX - i] - (rayon - i);
            }
        }
        for (int i = 1; i <= rayon; i++) {
            if (posX + i < 1000) {
                this.val_y[(int) posX + i] = this.val_y[(int) posX + i] - (rayon - i);
            }
        }

    }

    public void print_font() {
        int rgb = 8146484;
        Color color = new Color(rgb);
        StdDraw.setPenColor(color);
        StdDraw.filledPolygon(val_x, val_y);
        StdDraw.setPenColor(Color.WHITE);
    }

}

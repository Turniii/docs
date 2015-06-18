import java.awt.Color;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;

public class save {

    File f = new File("sauvegarde");

    public save() {

    }

    public String saveGame(tank tank1, tank tank2, font fond) {
        try {
            PrintWriter pw = new PrintWriter(new BufferedWriter(new FileWriter(f)));
            pw.println(tank1.px);
            pw.println(tank1.py);
            pw.println(tank1.canon_position);
            pw.println(tank1.life);
            pw.println(tank1.fuel);
            pw.println(tank1.bar_shell);
            pw.println(tank1.vertical_shell);
            pw.println(tank1.bombeH);
            pw.println(tank1.bombeMat);
            pw.println(tank2.px);
            pw.println(tank2.py);
            pw.println(tank2.canon_position);
            pw.println(tank2.life);
            pw.println(tank2.fuel);
            pw.println(tank2.bar_shell);
            pw.println(tank2.vertical_shell);
            pw.println(tank2.bombeH);
            pw.println(tank2.bombeMat);
            for (double x : fond.val_x) {
                pw.print(x);
                pw.print(",");
            }
            pw.print("\n");
            for (double y : fond.val_y) {
                pw.print(y);
                pw.print(",");
            }
            pw.close();
        } catch (IOException exception) {
            System.out.println("Erreur lors de la lecture : " + exception.getMessage());
        }

        return "Partie sauvegardée";
    }

    public void loadSave(tank tank1, tank tank2, font fond) throws FileNotFoundException, IOException {
        try {

            FileReader fr = new FileReader(f);
            BufferedReader br = new BufferedReader(fr);

            try {
                tank1.px = Double.parseDouble(br.readLine());
                tank1.py = Double.parseDouble(br.readLine());
                tank1.canon_position = Integer.parseInt(br.readLine());
                tank1.color = Color.RED;
                tank1.life = Integer.parseInt(br.readLine());
                tank1.fuel = Integer.parseInt(br.readLine());
                tank1.bar_shell = Integer.parseInt(br.readLine());
                tank1.vertical_shell = Integer.parseInt(br.readLine());
                tank1.bombeH = Integer.parseInt(br.readLine());
                tank1.bombeMat = Integer.parseInt(br.readLine());
                tank2.px = Double.parseDouble(br.readLine());
                tank2.py = Double.parseDouble(br.readLine());
                tank2.canon_position = Integer.parseInt(br.readLine());
                tank2.color = Color.BLUE;
                tank2.life = Integer.parseInt(br.readLine());
                tank2.fuel = Integer.parseInt(br.readLine());
                tank2.bar_shell = Integer.parseInt(br.readLine());
                tank2.vertical_shell = Integer.parseInt(br.readLine());
                tank2.bombeH = Integer.parseInt(br.readLine());
                tank2.bombeMat = Integer.parseInt(br.readLine());
                String x = br.readLine();
                String y = br.readLine();

                String[] valeursX = x.split(",");
                String[] valeursY = y.split(",");
                int i = 0;
                int j = 0;
                double val_x[] = new double[1001];
                double val_y[] = new double[1001];
                for (String val : valeursX) {
                    val_x[i] = Double.parseDouble(val);
                    i++;
                }
                for (String val : valeursY) {
                    val_y[j] = Double.parseDouble(val);
                    j++;
                }
                fond.val_x = val_x;
                fond.val_y = val_y;
            } catch (IOException exception) {
                System.out.println("Erreur lors de la lecture : " + exception.getMessage());
            }
        } catch (FileNotFoundException exception) {
            System.out.println("Le fichier n'a pas été trouvé");
        }
    }
}

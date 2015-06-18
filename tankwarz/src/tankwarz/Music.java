import javax.sound.sampled.AudioInputStream;
import javax.sound.sampled.AudioSystem;
import javax.sound.sampled.Clip;
import javax.sound.sampled.FloatControl;

public class Music {

    public static synchronized void playSound(final String url, float value) {
        new Thread(new Runnable() {
  // The wrapper thread is unnecessary, unless it blocks on the
            // Clip finishing; see comments.
            public void run() {

                try {

                    Clip clip = AudioSystem.getClip();
                    AudioInputStream inputStream = AudioSystem.getAudioInputStream(
                            tankwarz.class.getResourceAsStream(url));
                    clip.open(inputStream);
                    FloatControl volume = (FloatControl) clip.getControl(FloatControl.Type.MASTER_GAIN);
                    volume.setValue(value);
                    
                    clip.loop(Clip.LOOP_CONTINUOUSLY);
                } catch (Exception e) {
                    System.err.println(e.getMessage());
                }
            }
        }).start();
    }
    
    public static synchronized void playSound2(final String url, float value) {
        new Thread(new Runnable() {
  // The wrapper thread is unnecessary, unless it blocks on the
            // Clip finishing; see comments.
            public void run() {

                try {

                    Clip clip = AudioSystem.getClip();
                    AudioInputStream inputStream = AudioSystem.getAudioInputStream(
                            tankwarz.class.getResourceAsStream(url));
                    clip.open(inputStream);
                    FloatControl volume = (FloatControl) clip.getControl(FloatControl.Type.MASTER_GAIN);
                    volume.setValue(value);
                    
                    clip.loop(0);
                } catch (Exception e) {
                    System.err.println(e.getMessage());
                }
            }
        }).start();
    }
}

package ffos.p3.ontologija;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;
import java.util.List;

public class AdapterListe extends RecyclerView.Adapter<AdapterListe.Red> {

    private List<Ontologija> podaci;
    private List<Ontologija> podaciTemp;
    private final LayoutInflater mInflater;
    private ItemClickListener mClickListener;

    public AdapterListe(Context context) {
        this.mInflater = LayoutInflater.from(context);
        podaci = new ArrayList<>();
    }

    @Override
    public Red onCreateViewHolder(ViewGroup roditelj, int viewType) {
        podaciTemp = new ArrayList<>(podaci);
        View view = mInflater.inflate(R.layout.red_liste, roditelj, false);
        return new Red(view);
    }

    @Override
    public void onBindViewHolder(Red red, int position) {
        Ontologija o = podaci.get(position);
        red.naziv.setText(o.getNaziv());
        red.izvodac.setText(o.getIzvodac());
        red.rockZanr.setText(o.getRockZanr());
        red.drzava.setText(o.getDrzava());
        //red.godina.setText(o.getGodina());
        red.brojPjesama.setText(o.getBrojPjesama());


    }

    @Override
    public int getItemCount() {
        return podaci==null ? 0 : podaci.size();
    }

    // Pohranjuje i reciklira pogled kako se prolazi kroz listu
    public class Red extends RecyclerView.ViewHolder implements View.OnClickListener {
        private final TextView naziv;
        private TextView izvodac;
        private final TextView rockZanr;
        private final TextView drzava;
        //private TextView godina;
        private final TextView brojPjesama;


        Red(View itemView) {
            super(itemView);
            naziv = itemView.findViewById(R.id.naziv);
            izvodac = itemView.findViewById(R.id.izvodac);
            rockZanr = itemView.findViewById(R.id.rockZanr);
            drzava = itemView.findViewById(R.id.drzava);
            //godina = itemView.findViewById(R.id.godina);
            brojPjesama = itemView.findViewById(R.id.brojPjesama);
            itemView.setOnClickListener(this);
        }

        @Override
        public void onClick(View view) {
            if (mClickListener != null) mClickListener.onItemClick(view, getAdapterPosition());
        }
    }

    public Ontologija getItem(int id) {
        return podaci.get(id);
    }

    public void setPodaci(List<Ontologija> itemList) {
        this.podaci = itemList;
    }

    public void setClickListener(ItemClickListener itemClickListener) {
        this.mClickListener = itemClickListener;
    }

    public interface ItemClickListener {
        void onItemClick(View view, int position);
    }

}
